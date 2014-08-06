#!/usr/bin/perl                
# Toan Nguyen
# CSCI 342
# perl1_Ac.cgi the action form of Perl1_1 program
use CGI ':standard';
print header;
print start_html("Calculate MPG");
$userMile = param("Miles");
$userGallon = param("Gallons");
   $MPG = $userMile / $userGallon;
   $MPG = sprintf("%.2f", $MPG);
   print "Car consumption: $MPG mpg";
 


print end_html; 
