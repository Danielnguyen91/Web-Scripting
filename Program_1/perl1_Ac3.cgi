#!/usr/bin/perl 
# Toan Nguyen
# CSCI 342              
# perl1_Ac3.cgi Action form of perl1_3 program
use CGI ':standard';
print header;
print start_html("Conversion tool");
$usermoney = param("Money");
$usergas = param("Gas");
$radio = param("Conversion");
$radio1 = param("Conversion1");
$rate = param("Rate");
print "Conversion result";
 if( ($radio eq "US") && ($radio1 eq "Canada1")) {
	if (($usermoney =~ /^+?\d+\.?\d*$/) || ($usergas =~ /^+?\d+\.?\d*$/)) 
		{
		   if ($rate =~ /^+?\d+\.?\d*$/) {
		   $usercan = $usermoney * $rate;}
		   else {
		   print br,'please enter the valid rate';
                print start_html(
               -head=>meta({-http_equiv => 'refresh',
                -content => '3;URL=http://sw.cs.wwu.edu/~nguyen82/cgi-bin/Program_1/perl1_3.cgi' }),
          );
      }
	
		   $userlit = $usergas / 0.26417;
		   $usercan = sprintf("%.2f", $usercan);
		   $userlit = sprintf("%.2f", $userlit);
		   print br, " you spend $usermoney dollars = $usercan dollars canada";
		   print br,"you buy $usergas gallons = $userlit liters";
		}
	 else{
		print "\please enter the valid input\n";
                print start_html(
               -head=>meta({-http_equiv => 'refresh',
                -content => '3;URL=http://sw.cs.wwu.edu/~nguyen82/cgi-bin/Program_1/perl1_3.cgi' }),
          );
      }

	
 } elsif( ($radio eq "Canada") && ($radio1 eq "US1")) {
	if (($usermoney =~ /^+?\d+\.?\d*$/) || ($usergas =~ /^+?\d+\.?\d*$/)) 
		{
		  if ($rate =~ /^+?\d+\.?\d*$/) {
		   $userus = $usermoney / $rate;}
		   else {
			 print br,'please enter the valid rate';
                print start_html(
               -head=>meta({-http_equiv => 'refresh',
                -content => '3;URL=http://sw.cs.wwu.edu/~nguyen82/cgi-bin/Program_1/perl1_3.cgi' }),
          );
      }

		   $usergallon = $usergas * 0.26417;
		   $userus = sprintf("%.2f", $userus);
		   $usergallon = sprintf("%.2f", $usergallon);
		   print br,"you spend $usermoney Dollars canada = $userus Dollars ";
		   print br,"you buy $usergas Liters = $usergallon Gallons";
		}
	 else{
		print br,'please enter the valid input';
                print start_html(
               -head=>meta({-http_equiv => 'refresh',
                -content => '3;URL=http://sw.cs.wwu.edu/~nguyen82/cgi-bin/Program_1/perl1_3.cgi' }),
          );
}
}
else {
	print br,"\Please choose one of unit you want to convert to\n";
                print start_html(
               -head=>meta({-http_equiv => 'refresh',
                -content => '3;URL=http://sw.cs.wwu.edu/~nguyen82/cgi-bin/Program_1/perl1_3.cgi' }),
          );
}


	

print end_html;
