<?php 
$styles = '.limiter{width:100%;margin:0 auto}.container-table100{width:100%;min-height:100vh;background:#fff;display:-webkit-box;display:-webkit-flex;display:-moz-box;display:-ms-flexbox;display:flex;align-items:center;justify-content:center;flex-wrap:wrap;padding:33px 30px}.wrap-table100{width:1170px}*{padding:0;box-sizing:border-box}*,a,h1,h2,h3,h4,h5,h6,li,p,ul{margin:0}table,table *{position:relative}table thead tr{height:60px;background:#36304a}table td,table th{padding-left:8px;text-align:left}th,user agent stylesheet td{display:table-cell;vertical-align:inherit}tbody tr{font-size:15px;color:grey;background:#efefef}.table100-head th{font-size:18px;color:#fff}tbody tr:hover{color:#555}tbody tr:hover,tbody tr:nth-child(even),tbody tr:nth-child(odd):hover{background-color:#f5f5f5}tbody tr:hover,tbody tr:nth-child(odd){background-color:#fff}button:hover,tbody tr:hover{cursor:pointer}table tbody tr{height:50px}.table100-head th,tbody tr{font-family:OpenSans-Regular;line-height:1.2;font-weight:unset}.column1{width:260px;padding-left:40px}.column2{width:480px}.column3{width:245px}.column4{width:110px}.column5{width:170px}.column6{width:222px;padding-right:62px}.head{font-weight:700;color:#000}';
        
echo '<html>
        <head>
        <style>
            '.$styles.'
        </style>
        </head>
        <body>
        <h3>Password update notification agnisys</h3>
        <div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
                <div class="table100">
                   
					<table>
						<tbody>
                        
                                <tr>
                                    <td class="column1 head">New password</td>
                                    <td class="column2">'.$data->pass.'</td>
                                    
                                </tr>
                                
                        </tbody>
                </table>
                </body>
                </html>';

?>