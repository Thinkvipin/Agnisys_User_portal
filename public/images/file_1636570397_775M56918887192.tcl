#******** © 2015 Agnisys, Inc.  ALL RIGHTS RESERVED ********
############## Extract the registers / block

proc find_locks {elem} {
   # "find_locks" proc iterates recursively through "elem" object heirarchy to find "unlock_key" property of registers
   #    and adds it to register description       

   #set system_props {name}
   #set board_props {name}

   #Maintain a list of properties to be printed
   #set chip_props {name offset external size address coverage type variant}
   #set block_props {name offset external size address coverage type variant}
   #set reg_props {name offset address external width coverage type variant is_lock_reg protocol key}
   #set reggroup_props {name offset address external size repeat coverage type variant}
   #set field_props {name bits sw_access hw_access default_value high_offset low_offset size coverage type variant parity}

   set template_type [get_type $elem];

   switch $template_type {
      system   -
      board    -
      chip     -
      block    -
      reggroup {
         set children [get_objects $elem]
         foreach child $children {
            find_locks $child
         }
      }

      reg {
         set key [get_prop $elem unlock_key]
         if {![string equal $key ""]} {
            #set    reg_doc [get_prop $elem doc]
            #append reg_doc "Unlock Key = " $key
            set reg_doc [concat "Unlock Key =" $key]
            set_property $elem doc $reg_doc

            #set_property $elem add_doc $reg_doc

            #puts $reg_doc

            set block_name [get_prop [get_parent $elem] name]
            set reg_name   [get_prop $elem name]

            puts [format "%-20s %-20s %-20s" $block_name $reg_name $key]
         }
      }

      default {
      }
   }
}

############
## Main
############

# Check valid types against IC Reg Spec
#
set topElem [get_top];

puts "[format "%-20s %-20s %-20s" Block Register Key]";    # output headings to report
puts "[format "%-20s %-20s %-20s" ----- -------- ---]"

find_locks $topElem;

