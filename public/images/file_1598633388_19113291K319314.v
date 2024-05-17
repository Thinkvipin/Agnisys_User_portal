//----------------------------------------------------------------------------------------------------------
//***** Copyright 2015 All Rights Reserved. ***** 
// Company       : Agnisys Technology Pvt. limited
// 
// Design Name   : AMBA3AHBlite_widget
// Module Name   : AMBA3AHBlite_widget
// Project Name  : IDesignSpec
// Target Devices: 
// Tool versions : 
// Description   : This module is an interface between AMBA3-AHBLite bus and external hardware inside the block. 
//                 This module accepts signals from the bus and transform them into the internal signals. 
// 
//
// Version history:
//-----------------------------------------------------------------------------------------------------------
//    When       | Version | Who      | What
//-----------------------------------------------------------------------------------------------------------
//		         |  1.1    | rsb
//  Sep/2015     |  2.0    | MP & RS  | AMBA-AHB3LITE standard compliance
// 03/Oct/2015   |  2.1    | RS       | Fix latency error 
// 12/Oct/2015   |  2.2    | RS       | Fix back to back write and read
// 17/Jan/2019   |  2.3    | KS       | Fix the timing loop with hreadyout signal
// 18/Jan/2019   |  2.4    | KS       | delayed the address_ff, so that it wait for correct transaction
// 21/jan/2019   |  3.0    | KS       | fixed error in case of latency, pruning error
//                                      optimize code and removed sWrValidDecodeError and nValidDecodeError
// 05/Mar/2020   |  4.1    | 	       | Fixed address issue with burst wrap case
//-----------------------------------------------------------------------------------------------------------
//
// The Supported features of AMBA3-AHBLite are :
//			1. burst transfers
//			2. single-clock edge operation
//			3. non-tristate implementation
//			4. wide data bus configurations, 64, 128, 256, 512, and 1024 bits.
//
// Unsupported features : 
//			1. Multi masters(Arbitration)
//	        2. Unsupported signal is HMASTLOCK.
//			3. 1KB address boundary :  This version of widget not restrict this boundary in burst transfer. Because the IDS rtl slave can cross 1KB boundary.
//                                    In this case, its master responsbility not to be send the 1KB boundary cross burst. 
//                                    Master should be AMBA-AHB standard compliance.    
// 
//
//
//   Internal registers:
//------------------------------------------------------------------------------------------------------------------------------------------------------------
// S.No. |   Name                  |  Deafault           | Description
//------------------------------------------------------------------------------------------------------------------------------------------------------------
// 1.    | sErrorBf                |  0                  | Hold the slave error for data phase.
// 3.    | wr_stb_f                |  0                  | Hold the write strobe value for resposne phase.
// 4.    | sWrRespTrans            |  1                  | Hold the write response from slave side, in case if there is any latency to return the bus free.
// 5.    | errorWait               |  0                  | Hold the error, if there is any latency.
// 6.    | hresp_f                 |  0                  | Hold the previous cycle response, to make it two cycle error resposne.
// 8.    | rd_stb_f                |  0                  | Hold the read strobe value for resposne phase.
// 11.   | mBurstAddrCal           |  0                  | Hold the calculated/sent address to slave in burst process. 
// 12.   | mWrBurstTransInited     |  0                  | Hold the value of initiated write burst.
// 13.   | mRdBurstTransInited     |  0                  | Hold the value of initiated read burst.
// 14.   | mBurstBytesBuff         |  0                  | Hold the value of total number of bytes for entire burst proccess.
// 15.   | wrapEndAddrBuff         |  0                  | Hold the end wrap address of innitiated burst.
// 16.   | sentBytes               |  0                  | Hold the total sent bytes during the burst process.
// 17.   | wrapStartAddrBuff       |  0                  | Hold the start wrap address of innitiated burst. 
// 18.   | hprot_f                 |  0                  | Hold the hresp value to stable hresp for two cycle.
// 20.   | byte_enb_f              |  0                  | Hold the enable bits value for burst process.
//------------------------------------------------------------------------------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------------------------------------------------------------------------------
//
//

`define ASYNC           // To change the reset behaviour as synchronous/asynchronous


module AMBA3AHBlite_widget #(
    parameter addr_width = 32,   // Address width
    parameter bus_width  = 32    // Bus width
)
    (

        // MASTER SIGNALS :
        input hclk,                      // This clock times all bus transfers. All signal timings are related to the RISING EDGE of HCLK.
        input hresetn,                   // The bus reset signal is active LOW and is used to reset the system and the bus. This is the only active LOW signal.
        input hwrite,                    // When HIGH this signal indicates a WRITE transfer and when LOW a READ transfer.
        input [1:0] htrans,              // Transfer type, Master Indicates the type of the current transfer, which can be NONSEQUENTIAL, SEQUENTIAL, IDLE or BUSY
        input [2:0] hsize ,              // Indicates the size of the transfer(8/16/32 bit). The protocol allows for larger transfer sizes up to a maximum of 1024 bits.
        input [2:0] hburst,              // Burst type Master, 4, 8 and 16 beat bursts are supported and the burst may be either incrementing or wrapping.
        input [3:0] hprot ,              // Protection control, The protection control signals provide additional information about a bus access.
        input [bus_width-1 :0] hwdata,   // The write data bus is used to transfer, master to the bus slaves during write operations. A minimum data bus width of 32 bits is recommended. -
        input [addr_width-1:0] haddr,    // The 32-bit system address bus.
        input hready,                    // When HIGH, the HREADY signal indicates to the master, that the previous transfer is complete.
        input hsel,                      // Slave select Decoder,this signal indicates that the current transfer is intended for the selected slave.
        // SLAVE SIGNALS :	
        output [bus_width-1:0] hrdata,   // The read data bus is used to transfer data from bus slaves to the bus master during read operations.                  
        output hresp,                    // The transfer response, Four different responses are provided, OKAY and ERROR.
        output hreadyout,                // When HIGH the HREADY signal indicates that a transfer has finished on the bus. This signal may be driven LOW to extend a transfer. 


        //Agnisys proprietary bus signals
        output clk,                         // Clock 
        output reset_l,                     // Reset 		  : By default it is active LOW.
        output wr_stb,                      // Write strobe   : This should be active HIGH during the write transfer.
        output rd_stb,                      // Read strobe    : This should be active HIGH during the read transfer.
        output [bus_width-1:0] wr_data,     // Write data bus
        output [addr_width-1:0] address,    // Address bus
        output [bus_width/8-1 :0] byte_enb, // Byte enable
        output [3:0] hprot_i,               // Protection 

        input request,                      // Request 		   : HIGH indicates the bus is free for further write transaction, if LOW bus is busy. By default it is active HIGH.
        input error,                        // Error   		   : Protection/non-existent error addressed by slave.	
        input rd_data_vld,                  // Read data valid : There is valid read data available on rd_data bus. 
        input rd_wait,                      // Read wait       : HIGH indicates the bus is idle, if LOW bus is busy. By default it is active HIGH.
        input [bus_width-1:0] rd_data       // Read data bus

    );





  //--------------------------------------------------------------------
  // WRITE/READ TRANSFER 
  //
  //
  //  NOTE :: * The write data(hwdata) is independent of control/address signal. So this will be used by IDS slave directly.
  //            It will be connected direct to wr_data.
  //
  // BASIC TRANSFER : 
  // Master Bus : hclk, haddr, hwdata, hreadyout , hrdata
  // IDS Slave  : clk, address, byte_enb, wr_stb, wr_data, request
  //            ___    ___     ___    __
  // hclk :  __|1  |__|2  |__ |3  |__| 
  // 
  //      		 At 1st rising edge of the clock cycle, master will send the transfer.
  //      		 At 2nd rising edge of the clock cycle, IDS slave will sample the transfer.
  //      		 At 3rd rising edge of the clock cycle, IDS slave will drive the appropraite response signal and sampled by the master.
  //
  //
  // TRANSFER WITH WAIT STATES : 
  //                   ___    ___    ___    ___    ___    ___  
  // hclk        :  __|1  |__|2  |__|3  |__|4  |__|5  |__|6  |_
  //             :     __________                _//____________
  // hreadyout   :  __|1         |___*_____*____|2         
  //
  //
  //       		hreadyout  will be asserted low to extend the transfer.
  //            At 3rd rising edge of the clock cycle, hreay will be low to extend the transfer. 
  //            If there is any latency in the slave,  the hreadyout  should be low at 3rd cycle(at response cycle) imidiately.
  //
  // NOTE : For write operations the bus master will hold the data stable throughout the extended cycles. 
  //        For read transfers the slave does not have to provide valid data until the transfer is about to complete.
  //
  //--------------------------------------------------------------------------------------------------------------
  //
  // SLAVE TRANSFER RESPONSES: hreadyout 
  //       The hreadyout  signal is used to extend the transfer and this works in combination with the response signals, HRESP, which provide the status of the transfer.
  //       The slave can complete the transfer in a number of ways. 
  //       It can:
  //               complete the transfer immediately.
  //               insert one or more wait states to allow time to complete the transfer.
  //               signal an error to indicate that the transfer has failed.
  //               delay the completion of the transfer, but allow the master and slave to back off the bus, leaving it available for other transfers(IDS don't support this).
  //
  //
  // hresp :
  //  0     OKAY  -  When HREADYis HIGH this shows the transfer has completed successfully. The OKAY response is also used for any additional cycles that are inserted, with 
  //                  HREADYLOW, prior to giving one of the three other responses. 
  //  1     ERROR -  This response shows an error has occurred. The error condition should be signalled to the bus master so that it is aware the transfer has been unsuccessful.
  //                  NOTE : A two-cycle response is required for an error condition. And rest of two response state is not supported by IDS.
  //         (RETRY,SPLIT) - Not supported by IDS, As mutimaster/arbritation not supported.
  //          




  // Wire declaration

  integer i;
 
  reg wr_trans;
  reg rd_trans;
  
  wire BurstTrans;
  
  // mWriteTrans : Write transaction is sampled. Transaction will sample when hreadyout  is HIGH from slave side and transaction from master is NONSEQ/SEQ.
  // mWrTransOk  : Write transaction is valid, if it's not IDLE/BUSY.

  wire mWriteTrans ;
  wire mWrTransOk  ;

  // mReadTrans  : Read transaction is sampled
  wire mRdTransOk ;
  
  // mReadTrans  : Read transaction is sampled
  wire mReadTrans ;

  // WRITE RESPONSE:
  wire sWriteResp ;


  // READ RESPONSE: The rd_wait let the bus is free for read operation or not. And rd_data_vld is that the read data is valid. It is always availale one cycle before of rd_wait
  //                in case of latency in read. That's why we are oring this with rd_wait in sReadFree.  

  wire sReadResp ;




  // Internal Register
  // hresp : Response is OKAY(1'b0) or ERROR(1'b1). If there is any error then response sholud be stable for two clock cycle. For this we will regiter error for one clock cycle.
  //         If hreadyout  is low(in case of wait state in the slave), the response sholud be OKAY untill slave come back with the valid response.
  //         Default value of register is 0.

  // Slave error buffer : To introduce a delay in error, the slave always responde the error in the same cycle if there is no latency.
  reg sErrorBf;





 

  // Write strobe bufffer for write data phase, used if the slave responde back some time later.
  reg wr_stb_f ; //



  // Write transfer response waiting from slave side, is it done or not.
  reg sWrRespTrans ;


  // Error waiting for valid response cycle from slave side.
  reg errorWait ;

  // HRESP buffer : HRESP exists in the previos cycle, because two cycle error response is must. 
  reg hresp_f;
  wire hresp_i ;
 

  // Read strobe bufffer for read data phase, used if the slave responde back some time later.
  reg rd_stb_f; 

  
  // Burst transfer initiated : 
  // mWrBurstTransInit : Master write burst transfer initialised
  // mRdBurstTransInit : Master read burst transfer initialised
  // mBurstTransInit   : Master write/read burst transfer initialised
 // wire mWrBurstTransInit ;
 // wire mRdBurstTransInit ;
 // wire mBurstTransInit ;

 // wire [addr_width-1:0] address_i;    // Addreess bus
  reg  [addr_width-1:0] address_ff;    // Addreess bus

  reg  wr_stb_ff ;
  reg  rd_stb_ff ;
  
  //wire wr_stb_i ;
  //wire rd_stb_i ;

  // Burst address calculation
  //reg [addr_width - 1 : 0] mBurstAddrCal ;

  // Burst transfer terminated by master
  // mWrBurstTransInit == 1'b1 & hburst == 3'b000 : Single transfer 
  //wire mBurstTransTermnt ;
  //reg mBurstTransTermnt_f ;


  // Write burst proccessed
  // mWrBurstProc : Master write burst 
  // mRdBurstProc : Master read burst 
  ///wire mWrBurstProc ;
  //wire mRdBurstProc ;

  // Burst initiated address 
  //wire [addr_width - 1 :0] mBurstAddress ;

  // Master burst wait state
  //wire mBurstWait ;


  // Burst transfer is in process
  // mWrBurstTransInited : Master write burst is in process
  // mRdBurstTransInited : Master read burst is in process
  // mBurstTransInited   : Master write/read is in process
  //reg mWrBurstTransInited ;
  //reg mRdBurstTransInited ;
  //wire mBurstTransInited ;


  // Single burst transfer
  //wire mBurstSingleTrans ; 

  // Simple transfer address
  //wire [addr_width - 1 : 0] mSimpleAddr ;

  // mTransOk : Is write/read transfer is OK 
 // wire mTransOk ;

 
  // mFixedLengthBurst : Is fixed length burst or not. 
  //wire mFixedLengthBurst ;


  // Total Bytes
  //wire [11:0] mBurstBytes ;
  //reg  [11:0] mBurstBytesBuff ;

  // Total bytes transfer : 2**hsize
 // wire [7:0]transSize ;
  
  // log bits of hsize
  // wire [2:0] logBits;

  // wrapStartAddrV1 : Temp address calculation varaible
 //wire [addr_width-1:0] wrapStartAddr ;

  // Non-existing address

  // Total bytes sent : Total number of sent bytes.
  //reg [11 : 0] sentBytes ;

  // Wrap start address buffer
  //reg [addr_width-1 : 0] wrapStartAddrBuff ;
 // wire [addr_width-1 : 0] wrapEndAddr ;
 // reg [addr_width-1 : 0] wrapEndAddr_f ;

  // hprot_f : Protection buffer
  //           Is saving the hprot status, as it should be stable during burst operation
  reg [3:0] hprot_f ;
  
   reg request_f;

  // OKAY response 
  wire isRespOkay ;

  // Reset signal
  // By default Both signals are active LOW.
  assign reset_l = hresetn ;



  // clock signal
  // Both signal timings are rising edge.
  assign clk = hclk ;  



  //  NOTE :: * The write data(hwdata) is independent of control/address signal. So this will be used by IDS slave directly. Master will extend the write data in wait state.
  //            It will be connected direct to wr_data.
  //
  assign wr_data = hwdata ; 

  //   
  // HTRANS[1:0]			 Type		 Description
  //  00					 IDLE		 Indicates that no data transfer is required.
  //  01 					 BUSY        The BUSY transfer type allows bus masters to insert IDLE cycles in the middle of bursts of transfers.
  //  10 					 NONSEQ      Indicates the first transfer of a burst or a single transfer. 
  //  11					 SEQ		 The remaining transfers in a burst are SEQUENTIAL and the address is related to the previous transfer. 
  //





  //------------------------------------------------------------------------------------------------------------------
  // Address Phase : 
  // NOTE : The address will go in slave when it is free, means hreadyout  is HIGH and response "hresp" is OKAY. And slave is selected hsel.
  // mBurstAddress : Burst address will go in slave, if there is any burst is in process, mWrBurstProc(Write burst process) or mRdBurstProc(Read burst process).
  // address       : address will go in, only if the slave is selected. And response, hreadyout  should be OKAY. 
  // hprot_i       : Protection 

  //assign mTransOk = mWrTransOk | mRdTransOk ;

 // assign mSimpleAddr = (hready == 1'b1 & hresp == 1'b0 & mTransOk == 1'b1 & hsel == 1'b1) ? haddr : {addr_width{1'b0}} ;
//
 // assign address_i =  (htrans != 2'b00) ? ((mWrBurstProc == 1'b1 | mRdBurstProc == 1'b1) ? mBurstAddress : mSimpleAddr) : {addr_width{1'b0}} ; 

  
  //assign address_i =  (hsel == 1'b1 & htrans != 2'b00) ? ((mWrBurstProc == 1'b1 | mRdBurstProc == 1'b1) ? mBurstAddress : mSimpleAddr) : {addr_width{1'b0}} ; 

  //assign hprot_i = mBurstTransInited ? hprot_f : mTransOk ? hprot : 4'b0 ;

  assign hprot_i = (BurstTrans) ?  hprot_f : hprot ;

  `ifdef ASYNC
  always@(posedge hclk or negedge hresetn)
    `elsif SYNC
    always @( posedge hclk)
      `endif
      begin
        if (!hresetn)
          begin
            address_ff <= {addr_width{1'b0}} ;
          end
        else 
          begin
		    if(mWriteTrans | mReadTrans) begin
               address_ff <= haddr ; // 
			end    
          end
      end

  assign address =  address_ff ;

  //------------------------------------------------------------------------------------------------------------------

  `ifdef ASYNC
  always@(posedge hclk or negedge hresetn)
    `elsif SYNC
    always @( posedge hclk)
      `endif
      begin
        if (!hresetn)
          begin
            wr_trans <= 1'b0 ;
			wr_stb_ff <= 1'b0;
          end
        else 
          begin
            case(wr_trans)
             0:begin			     
			    if(mWriteTrans) begin 
				    wr_trans <= 1'b1;
					wr_stb_ff <= 1'b1;  
				  end				
			   end
             1:begin
			    if(!mWriteTrans) begin
			       wr_stb_ff <= 1'b0;
				   wr_trans <= 1'b0;
				  end  
			   end
             endcase			 
          end
      end

   assign wr_stb =  wr_stb_ff;

  //------------------------------------------------------------------------------------------------------------------
  // Master commenced write transfer
  //
  // mWriteTrans    : Write transaction is sampled with hwrite HIGH. Transaction will be sample when hreadyout  is HIGH from slave side,  and transaction type "htrans" is NONSEQ/SEQ.
  //                  Response hresp sholud be OKAY. There wiil be no transaction in waiting "sWrRespTrans" state. 
  //                  If there is already a ERROR response on "hresp" bus then it should wait for "respDone".
  // mWrTransOk     : Write transaction is valid, if it's not IDLE/BUSY.
  // wr_stb         : Write strobe to slave.
  // wrTransDoneAck : Write transfer has done, may be within one cycle or later. HIGH indicates there is a ongoing/pending write transfer. 
  //                  The process is still in progress not finished yet.

  assign mWrTransOk  = (htrans == 2'b10 | htrans == 2'b11) ? 1'b1 : 1'b0 ;
  assign mWriteTrans = (hwrite == 1'b1  & mWrTransOk == 1'b1 & hready == 1'b1 & hreadyout == 1'b1 & sWriteResp == 1'b1 & sWrRespTrans == 1'b1 ) ? 1'b1 : 1'b0 ;

  
 // assign wr_stb_i =  ((mWriteTrans | mWrBurstProc) & (~mRdBurstProc | mWrBurstTransInit) & (hsel == 1'b1 & (isRespOkay == 1'b0))) & hready & hreadyout; 


 /* `ifdef ASYNC
  always@(posedge hclk or negedge hresetn)
    `elsif SYNC
    always @( posedge hclk)
      `endif
      begin
        if (!hresetn)
          begin
            wr_stb_ff <= 1'b0 ;
          end
        else
          begin
            wr_stb_ff <= wr_stb_i ; // If request is low 
          end
      end
 */
  


  `ifdef ASYNC
  always@(posedge hclk or negedge hresetn)
    `elsif SYNC
    always @( posedge hclk)
      `endif
      begin
        if (!hresetn)
          begin
            sWrRespTrans <= 1'b1 ;
          end
        else if(wr_stb_ff) 
          begin
            sWrRespTrans <= request ; // If request is low then response will be in pending
          end
        else 
          begin
            sWrRespTrans <= 1'b1  ;
          end

      end



  `ifdef ASYNC
  always@(posedge hclk or negedge hresetn)
    `elsif SYNC
    always @(posedge hclk)
      `endif
      begin
        if (!hresetn)
          begin
            wr_stb_f <= 1'b0 ;
          end
        else if(wr_stb_ff == 1'b1 && request == 1'b0)
          begin
            wr_stb_f <= 1'b1;
          end
        else
          wr_stb_f <=  ~(request_f);  // The buffer write strobe will be reset when request is HIGH(same cycle or later). Or there is any error responded by slave.
      end

     //Anmol:-  delayed request for external register errors
	 `ifdef ASYNC
  always@(posedge hclk or negedge hresetn)
    `elsif SYNC
    always @(posedge hclk)
      `endif
      begin
        if (!hresetn) begin
            request_f <= 1'b0 ;
          end
        else  begin
           request_f <= request;
          end
      end


  //------------------------------------------------------------------------------------------------------------------
  // Master commenced read transfer
  //
  // mReadTrans  : Read transaction is sampled, hreadyout  and hresp must be OK.
  // mRdTransOk  : Read transfer is OK to sample.
  // rd_stb      : Read strobe, during read burst he read strobe will be stable.

  assign mRdTransOk  = (htrans == 2'b10 | htrans == 2'b11) ? 1'b1 : 1'b0 ;

  assign mReadTrans = (hwrite == 1'b0 & hready == 1'b1 & hreadyout == 1'b1 & mRdTransOk == 1'b1) ? 1'b1 : 1'b0 ;

  
  //assign rd_stb_i = (mRdTransOk & ((mReadTrans | mRdBurstProc) & (~(mWrBurstProc) | mRdBurstTransInit)) & (hsel == 1'b1 & isRespOkay == 1'b0)) & hready & hreadyout;
  
/*  `ifdef ASYNC
  always@(posedge hclk or negedge hresetn)
    `elsif SYNC
    always @( posedge hclk)
      `endif
      begin
        if (!hresetn)
          begin
            rd_stb_ff <= 1'b0 ;
          end
        else
          begin
            rd_stb_ff <= rd_stb_i ; // If request is low 
          end
      end  */

 `ifdef ASYNC
  always@(posedge hclk or negedge hresetn)
    `elsif SYNC
    always @( posedge hclk)
      `endif
      begin
        if (!hresetn)
          begin
            rd_trans <= 1'b0 ;
			rd_stb_ff <= 1'b0;
          end
        else 
          begin
            case(rd_trans)
             0:begin			     
			    if(mReadTrans) begin 
				    rd_trans <= 1'b1;
					rd_stb_ff <= 1'b1;  
				  end				
			   end
             1:begin
			    if(!mReadTrans) begin
			       rd_stb_ff <= 1'b0;
				   rd_trans <= 1'b0;
				  end  
			   end
             endcase			 
          end
      end	  
	  	 	  
  assign rd_stb =  rd_stb_ff;

  //------------------------------------------------------------------------------------------------------------------




  //------------------------------------------------------------------------------------------------------------------
  // Slave responses
  //
  // WRITE RESPONSE:
  assign sWriteResp =  request ; //isRespOkay ? 1'b1 : request ;


  // READ RESPONSE: If rd_wait is LOW bus is busy, HIGH bus is free. And rd_data_vld is that the read data is valid. It is always availale one cycle before of rd_wait
  //                in case of latency in read. That's why we are oring this with rd_wait in sReadResp.  



  assign sReadResp = rd_wait | rd_data_vld ;


  //------------------------------------------------------------------------------------------------------------------



  //------------------------------------------------------------------------------------------------------------------
  // BURST TRANSFER :
  //
  // NOTE :  The slave can determine when a burst has terminated early by monitoring the HTRANSsignals and ensuring that after the start of the burst every transfer is labelled as 
  //         SEQUENTIAL or BUSY. If a NONSEQUENTIAL or IDLE transfer occurs then this indicates that a new burst has started and therefore the previous one must have been terminated.
  //
  //
  // HBURST[2:0] Type		 Description
  //  000		 SINGLE		 Single transfer
  //  001 		 INCR 		 Incrementing burst of unspecified length
  //  010 		 WRAP4       4-beat wrapping burst
  //  011		 INCR4       4-beat incrementing burst
  //  100		 WRAP8       8-beat wrapping burst
  //  101 		 INCR8       8-beat incrementing burst
  //  110 		 WRAP16      16-beat wrapping burst
  //  111 		 INCR16      16-beat incrementing burst
  //
  //
  // HPROT[2] bufferable
  // HPROT[1] privileged
  // 
  // [2:0] hsize :   Indicates the size of the transfer(8/16/32 bit). The protocol allows for larger transfer sizes up to a maximum of 1024 bits.
  //
  //


  // mFixedLengthBurst : Is single transfer or unspecified legth transfer.
 // assign mFixedLengthBurst = (hburst == 3'b000 | hburst == 3'b001 | hburst == 3'b111 | hburst == 3'b011 | hburst == 3'b101) ? 1'b1 : 1'b0 ;


  // Burst transfer initiated :  
 // assign mWrBurstTransInit = (hsel == 1'b1 & htrans == 2'b10 & hready == 1'b1 & hreadyout == 1'b1 & hwrite == 1'b1) ?  1'b1 : 1'b0 ;
//  assign mRdBurstTransInit = (hsel == 1'b1 & htrans == 2'b10 & hready == 1'b1 & hreadyout == 1'b1 & hwrite == 1'b0) ?  1'b1 : 1'b0 ;

  // Single burst transfer
 /// assign mBurstSingleTrans = (hburst == 3'b000) ? 1'b1 : 1'b0 ;

  // Burst transfer terminated by master
  // Scenerios are : Burst transfer is IDLE or NONSEQ. Or if burst is a single transfer(hburst == 3'b000).
  //                    
 /// assign mBurstTransTermnt = ((mBurstTransInit) & mBurstSingleTrans) ? 1'b1 : (((htrans == 2'b10 | htrans == 2'b00 | (sentBytes == mBurstBytesBuff)) & (mRdBurstTransInited | mWrBurstTransInited) & ~mBurstTransInit & hready & hreadyout) ? 1'b1 : 1'b0) ; 

  // Write burst proccessed   
  // Read burst proccessed
 // assign mWrBurstProc = (mWrBurstTransInit == 1'b1 | mWrBurstTransInited == 1'b1) ? 1'b1 : 1'b0 ;
 // assign mRdBurstProc = (mRdBurstTransInit == 1'b1 | mRdBurstTransInited == 1'b1) ? 1'b1 : 1'b0 ;

 // assign mBurstTransInited = mRdBurstTransInited | mWrBurstTransInited ;

 /*
 
  `ifdef ASYNC
  always@(posedge hclk or negedge hresetn)
    `elsif SYNC
    always @( posedge hclk)
      `endif
      begin
        if (!hresetn)
          begin
            mBurstTransTermnt_f  <= 1'b0;          
          end
        else
          begin
            mBurstTransTermnt_f  <= mBurstTransTermnt ;
          end
      end 
  
  

  assign wrapStartAddr = (mBurstTransInit) ? (    
    (hburst == 3'b010) ? 
    ((hsize == 3'b000) ? {haddr[addr_width-1: 2], {2{1'b0}}} :
     (hsize == 3'b001) ? {haddr[addr_width-1: 3], {3{1'b0}}} :
     (hsize == 3'b010) ? {haddr[addr_width-1: 4], {4{1'b0}}} :
     (hsize == 3'b011) ? {haddr[addr_width-1: 5], {5{1'b0}}} :
     (hsize == 3'b100) ? {haddr[addr_width-1: 6], {6{1'b0}}} :
     (hsize == 3'b101) ? {haddr[addr_width-1: 7], {7{1'b0}}} :
     (hsize == 3'b110) ? {haddr[addr_width-1: 8], {8{1'b0}}} :
     {haddr[addr_width-1: 9], {9{1'b0}}} 
    )
    :						  
    ((hburst == 3'b100) ? 
     ((hsize == 3'b000) ? {haddr[addr_width-1: 3], {3{1'b0}}} :
      (hsize == 3'b001) ? {haddr[addr_width-1: 4], {4{1'b0}}} :
      (hsize == 3'b010) ? {haddr[addr_width-1: 5], {5{1'b0}}} :
      (hsize == 3'b011) ? {haddr[addr_width-1: 6], {6{1'b0}}} :
      (hsize == 3'b100) ? {haddr[addr_width-1: 7], {7{1'b0}}} :
      (hsize == 3'b101) ? {haddr[addr_width-1: 8], {8{1'b0}}} :
      (hsize == 3'b110) ? {haddr[addr_width-1: 9], {9{1'b0}}} :
      {haddr[addr_width-1: 10], {10{1'b0}}} 
     ) 
     :
     ((hburst == 3'b110) ? 
      ((hsize == 3'b000) ? {haddr[addr_width-1: 4], {4{1'b0}}} :
       (hsize == 3'b001) ? {haddr[addr_width-1: 5], {5{1'b0}}} :
       (hsize == 3'b010) ? {haddr[addr_width-1: 6], {6{1'b0}}} :
       (hsize == 3'b011) ? {haddr[addr_width-1: 7], {7{1'b0}}} :
       (hsize == 3'b100) ? {haddr[addr_width-1: 8], {8{1'b0}}} :
       (hsize == 3'b101) ? {haddr[addr_width-1: 9], {9{1'b0}}} :
       (hsize == 3'b110) ? {haddr[addr_width-1: 10], {10{1'b0}}} :
       {haddr[addr_width-1: 11], {11{1'b0}}} 
      )
      : haddr
     )
    ) ) : haddr ;


  assign mBurstBytes =  (mBurstTransInit) ? (    
    (hburst == 3'b010 | hburst == 3'b011) ? 
    ((hsize == 3'b000) ? 12'b000000000100 :
     (hsize == 3'b001) ? 12'b000000001000 :
     (hsize == 3'b010) ? 12'b000000010000 :
     (hsize == 3'b011) ? 12'b000000100000 :
     (hsize == 3'b100) ? 12'b000001000000 :
     (hsize == 3'b101) ? 12'b000010000000 :
     (hsize == 3'b110) ? 12'b000100000000 :
     12'b001000000000
    )
    :						  
    ( (hburst == 3'b100 | hburst == 3'b101) ? 
     ((hsize == 3'b000) ? 12'b000000001000  :
      (hsize == 3'b001) ? 12'b000000010000 :
      (hsize == 3'b010) ? 12'b000000100000 :
      (hsize == 3'b011) ? 12'b000001000000 :
      (hsize == 3'b100) ? 12'b000010000000 :
      (hsize == 3'b101) ? 12'b000100000000 :
      (hsize == 3'b110) ? 12'b001000000000 :
      12'b010000000000
     ) 
     :
     ( (hburst == 3'b110 | hburst == 3'b111) ? 
      ((hsize == 3'b000) ? 12'b000000010000  :
       (hsize == 3'b001) ? 12'b000000100000 :
       (hsize == 3'b010) ? 12'b000001000000 :
       (hsize == 3'b011) ? 12'b000010000000 :
       (hsize == 3'b100) ? 12'b000100000000 :
       (hsize == 3'b101) ? 12'b001000000000 : 
       (hsize == 3'b110) ? 12'b010000000000 :
       12'b100000000000
      )
      : transSize
     )
    ) ) : transSize ;

  assign transSize = (hsize == 3'b000) ? 8'b00000001  :
    (hsize == 3'b001) ? 8'b00000010 :
    (hsize == 3'b010) ? 8'b00000100 :
    (hsize == 3'b011) ? 8'b00001000 :
    (hsize == 3'b100) ? 8'b00010000 :
    (hsize == 3'b101) ? 8'b00100000 :
    (hsize == 3'b110) ? 8'b01000000 :
    8'b10000000 ;	

  

  assign logBits = (hsize == 3'b000) ? 3'b000  :
    (hsize == 3'b001) ? 3'b001 :
    (hsize == 3'b010) ? 3'b010 :
    (hsize == 3'b011) ? 3'b011 :
    (hsize == 3'b100) ? 3'b100 :
    (hsize == 3'b101) ? 3'b101 :
    (hsize == 3'b110) ? 3'b110 :
    3'b111 ;	

  assign wrapEndAddr =  (((hburst == 3'b010) || (hburst == 3'b100) || (hburst == 3'b110)) && mBurstTransInit) ? 
						((hburst == 3'b010) ?  ((wrapStartAddr + (4 << logBits)) - transSize) :
						 (hburst == 3'b100) ?  ((wrapStartAddr + (8 << logBits)) - transSize) :
						 ((wrapStartAddr + (16 << logBits)) - transSize))
						: {addr_width{1'b0}} ;
	

 `ifdef ASYNC
  always@(posedge hclk or negedge hresetn)
    `elsif SYNC
    always @(posedge hclk)
      `endif
      begin
        if (!hresetn)
          begin
            wrapEndAddr_f <= {addr_width{1'b0}};
          end
        else
          begin
            if(mBurstTransInit == 1'b1)
              begin
                wrapEndAddr_f <= wrapEndAddr;
              end
			  else if(mBurstTransTermnt == 1'b1)
			  begin
			   wrapEndAddr_f <= {addr_width{1'b0}};
			  end
	      end
      end

  */
  //wire mBurstTransInit ;
// assign mBurstTransInit = mWrBurstTransInit | mRdBurstTransInit ;

  // Burst initiated address  
 // assign mBurstAddress =  (mBurstTransInit == 1'b1) ? haddr : (mBurstTransTermnt_f == 1'b0) ? mBurstAddrCal : haddr ; //{addr_width{1'b0}} ;

  // Master burst wait state : BUSY state
 // assign mBurstWait = (htrans == 2'b01) ? 1'b1 : 1'b0 ;

  // Burst proccess buffers
  // mBurstBytesBuff   : Total number of bytes in buffer
  // wrapEndAddrBuff   : Wrap end address buffer
  // wrapStartAddrBuff : Wrap start address buffer

 /* 
  
  `ifdef ASYNC
  always@(posedge hclk or negedge hresetn)
    `elsif SYNC
    always @( posedge hclk)
      `endif
      begin
        if (!hresetn)
          begin
            mBurstBytesBuff   <= 12'h0;            
          end
        else if(mBurstTransInit == 1'b1) // When burst is instansiated
          begin
            mBurstBytesBuff    <= mBurstBytes ;
          end
        else if(mBurstTransTermnt == 1'b1)
          begin
            mBurstBytesBuff   <=  12'h0  ;           
          end
      end

 

  `ifdef ASYNC
  always@(posedge hclk or negedge hresetn)
    `elsif SYNC
    always @( posedge hclk)
      `endif
      begin
        if (!hresetn)
          begin
            wrapStartAddrBuff <= {addr_width{1'b0}};
          end
        else if(mBurstTransInit == 1'b1) // When burst is instansiated
          begin
            wrapStartAddrBuff  <= wrapStartAddr ;           
          end
        else if(mBurstTransTermnt == 1'b1)
          begin
            wrapStartAddrBuff <=  {addr_width{1'b0}} ;
          end
      end
  

  // Total sent bytes

    `ifdef ASYNC
  always@(posedge hclk or negedge hresetn )
    `elsif SYNC
    always @( posedge hclk)
      `endif
      begin
        if (!hresetn)
          begin
            mBurstAddrCal <= {addr_width{1'b0}} ;
          end
        else if(hready && mBurstWait == 1'b0)  // Slave is busy || burst state is BUSY
          begin
            if((mBurstAddress == wrapEndAddr_f) && !mFixedLengthBurst) // address is equal to warp end address && INCR burst
              begin
                mBurstAddrCal <=  wrapStartAddrBuff ;
              end
			 else if((mBurstAddress == wrapEndAddr) && !mFixedLengthBurst) // address is equal to warp end address && INCR burst
              begin
                mBurstAddrCal <=  wrapStartAddr ;
              end
            else if(mBurstTransInit) // First burst transfer
              begin
                mBurstAddrCal <=  mBurstAddress + transSize ; //2**hsize ;
              end
            else if(mWrBurstProc == 1'b1 || mRdBurstProc == 1'b1 ) // Burst process is processing
              begin
                mBurstAddrCal <= mBurstAddrCal + transSize ; 
              end
            else if(mBurstTransTermnt == 1'b1)
              begin  // Burst termination
                mBurstAddrCal <= mBurstAddress ;
              end 
          end 


      end

  // Total sent bytes

  `ifdef ASYNC
  always@(posedge hclk or negedge hresetn )
    `elsif SYNC
    always @( posedge hclk)
      `endif
      begin
        if (!hresetn)
          begin
            sentBytes     <= 12'h0 ;
          end
        else if(hready  && hreadyout && mBurstWait == 1'b0) //(!hready || mBurstWait == 1'b1) // Slave is busy || burst state is BUSY
          begin
            if(mBurstTransTermnt == 1'b1)
              begin  // Burst termination
                sentBytes     <=  12'h0 ;
              end 
            else if(mBurstTransInit) // First burst transfer
              begin
                sentBytes     <=  transSize + transSize ; //2**hsize ;
              end
            else if(mWrBurstProc == 1'b1 || mRdBurstProc == 1'b1 ) // Burst process is processing
              begin
                sentBytes     <= sentBytes + transSize ;
              end
          end
      end


  // Write burst transfer is in process

  `ifdef ASYNC
  always@(posedge hclk or negedge hresetn)
    `elsif SYNC
    always @(posedge hclk)
      `endif
      begin
        if (!hresetn)
          begin
            mWrBurstTransInited <= 1'b0 ;
          end       
        else if(mWrBurstTransInit == 1'b1) 
          begin
            mWrBurstTransInited <= 1'b1 ;
          end
		else if(mBurstTransTermnt_f)
          begin
            mWrBurstTransInited <= 1'b0 ;
          end

      end

  // Read burst transfer is in process
  `ifdef ASYNC
  always@(posedge hclk or negedge hresetn)
    `elsif SYNC
    always @(posedge hclk) 
      `endif
      begin
        if (!hresetn)
          begin
            mRdBurstTransInited <= 1'b0 ;
          end
		else if(mRdBurstTransInit == 1'b1)
          begin
            mRdBurstTransInited <= 1'b1 ;
          end
        else if(mBurstTransTermnt_f)
          begin
            mRdBurstTransInited <= 1'b0 ;
          end
       

      end
  */

  // Burst Protection
/*  `ifdef ASYNC
  always@(posedge hclk or negedge hresetn) 
    `elsif SYNC
    always @(posedge hclk) 
      `endif
      begin
        if (!hresetn)
          begin
            hprot_f <= 4'b0 ;
          end	
        else if(mBurstTransInit)
          begin
            hprot_f <= hprot ;
          end
        else if(mBurstTransTermnt)
          hprot_f <= 4'b0 ;
      end
 */
 
  assign BurstTrans = (hburst != 0) ? 1'b1 : 1'b0;
 
 
 `ifdef ASYNC
  always@(posedge hclk or negedge hresetn)
    `elsif SYNC
    always @( posedge hclk)
      `endif
      begin
        if (!hresetn)
          begin
            hprot_f <= 4'b0 ;
          end
        else 
          begin
		    if(BurstTrans) begin
                hprot_f <= hprot ; // If request is low 
			  end 
            else begin
			     hprot_f <= 4'b0 ;
           	  end		
          end
      end

  	  
	  
	  
  //------------------------------------------------------------------------------------------------------------------
  // 
  // MASTER RESPONSES
  //
  // hready : Is WRITE/READ transfer is completed
    
  assign hreadyout =(wr_stb_ff == 1'b1 | wr_stb_f == 1'b1) ? (sWriteResp & ~(error | errorWait| sErrorBf)): (rd_stb_ff == 1'b1 | rd_stb_f == 1'b1) ? (sReadResp & ~(error | errorWait| sErrorBf)) :1'b1 ;

  // Error by slave : Wait state transfer error | Once cycle response error
 
  // hresp : Response is OKAY(1'b0) or ERROR(1'b1). If there is any error then response sholud be stable for two clock cycle. For this we will regiter error for one clock cycle.
  //         If hready is low(in case of wait state in the slave), the response sholud be OKAY untill slave come back with the valid response.
  //



  // OKAY response 
  //reg isRespOkay_f;

  assign isRespOkay = (htrans == 2'b00 || htrans == 2'b01) ? 1'b1 : 1'b0 ;
  
  //assign hresp = ((wr_stb_ff | rd_stb_ff) & error) | (hresp_f == 1'b1) ? 1'b1 : 1'b0 ;
   assign hresp = (hresp_i & (request_f) & rd_wait) | (hresp_f == 1'b1 & (request_f) & rd_wait) ? 1'b1 : 1'b0 ;
  //assign hresp = (hresp_i & request & rd_wait) | (hresp_f == 1'b1 & request & rd_wait) ? 1'b1 : 1'b0 ; //Anmol:- used delayed request_f for external register errors


  assign hresp_i = (wr_stb_ff | rd_stb_ff | wr_stb_f | rd_stb_f) & error ; //Anmol: used wr_stb_f & rd_stb_f for delayed transaction

  `ifdef ASYNC
  always@(posedge hclk or negedge hresetn)
    `elsif SYNC
    always @(posedge hclk)
      `endif
      begin
        if (!hresetn)
          begin
            hresp_f <= 1'b0 ;
          end
        else
          begin 
           // if (hresp_f && rd_wait && request && hready ==1'b1)
			if (hresp_f && rd_wait && request_f && hready ==1'b1) //Anmol:- used delayed request_f for external register errors
              begin
                hresp_f <= 1'b0 ;
              end
            else if(hresp_i)
              begin
                hresp_f <= hresp_i ;
              end
            //else
            //  hresp_f <= 1'b0 ;
          end
      end


   `ifdef ASYNC
  always@(posedge hclk or negedge hresetn)
    `elsif SYNC
    always @(posedge hclk)
      `endif
      begin
        if (!hresetn)
          begin
            sErrorBf  <= 1'b0 ;
          end
        else
          begin  
            if(sErrorBf && hresp)
              begin
                sErrorBf  <= 1'b0 ;
              end
          //  else if(error == 1'b1 && (wr_stb_ff | rd_stb_ff)) // && isRespOkay == 1'b0) Anmol:- for supporting error with external register interface
		  else if(error & (wr_stb_ff | rd_stb_ff | rd_stb_f | wr_stb_f)) // && isRespOkay == 1'b0)
              begin
                sErrorBf  <= error ; 
              end
            else
              begin
                sErrorBf  <= 1'b0 ;
              end
          end
      end


  // Error waiting for valid hready cycle, may be slave taking some latency to decide whether it is valid address/protction.
  `ifdef ASYNC
  always@(posedge hclk or negedge hresetn)
    `elsif SYNC
    always @(posedge hclk)
      `endif
      begin
        if (!hresetn)
          begin
            errorWait <= 1'b0 ;
          end
        else
          begin         
            if(sErrorBf == 1'b1 && (!rd_wait | !request)) //  && isRespOkay == 1'b0)
              begin
                //errorWait <= sErrorBf & ~(hresp);
                errorWait <= sErrorBf ;
              end
            else
            //  if (errorWait ==1'b1 && (rd_wait && request ))
			 if (errorWait ==1'b1 && (rd_wait && request_f ))  //Anmol:- used delayed request_f for external register errors
                begin 
                  errorWait <= 1'b0 ;
                end
          end
      end

 
 
	   `ifdef ASYNC
  always@(posedge hclk  or negedge hresetn)
    `elsif SYNC
    always @(posedge hclk)
      `endif
      begin
        if (!hresetn)
          begin
            rd_stb_f <= 1'b0 ;
          end
        else if(rd_stb_ff & (!rd_data_vld & !rd_wait))
          begin
            rd_stb_f <= 1'b1 ;
          end
		else
			rd_stb_f <=  ~(rd_wait | hresp);  // The buffer write strobe will be reset when request is HIGH(same cycle or later). Or there is any error responded by slave.
      end

	  

  //------------------------------------------------------------------------------------------------------------------



  //------------------------------------------------------------------------------------------------------------------
  // Valid Read data 
  //
  // NOTE : Read data is ampled in the widget on rd_data_vld. To extend the read data into data phase, otherwise it will return the read data in address phase. 
  //        Because the !hwrite assign directl to rd_stb, and IDS slave will return the data and response in the same cycle.

  assign hrdata = ((rd_stb | rd_stb_f) && rd_data_vld == 1'b1) ? rd_data : {bus_width{1'b0}} ; 


  //------------------------------------------------------------------------------------------------------------------


  //------------------------------------------------------------------------------------------------------------------
  // Valid write data bits 
  //
  // hsize[2:0]  :  Here 3 is the fixed width of hsize, it's independent of bus width. And the byte enable of IDS slave proprietary bus is dependent of bus width. 
  //                In the following loop, the value of hsize will be truncated in byte_enb bits.

  reg [bus_width/8-1 :0] byte_enb_f ;

  `ifdef ASYNC
  always@(posedge hclk or negedge hresetn)
    `elsif SYNC
    always @(posedge hclk)
      `endif
      begin
        if (!hresetn)
          begin
            byte_enb_f <= 1'b0;
          end
        else
          begin
            for (i = 0; i <= (bus_width/8 - 1); i=i+1) 
              begin
                if (i < 2**hsize) 
                  begin
                    byte_enb_f[i] <= 1'b1;
                  end
                else 
                  begin
                    byte_enb_f[i] <= 1'b0;
                  end
              end
          end
      end


  assign byte_enb = byte_enb_f ;




endmodule
