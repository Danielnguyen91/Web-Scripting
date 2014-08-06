#!/usr/bin/perl 
# Toan Nguyen
# CSCI 342              
# perl1_3.cgi conversion currency and gas between US and Candian unit
use CGI ':standard';
print header;
print start_html("perl1_3");
print '<form action="http://sw.cs.wwu.edu/~nguyen82/cgi-bin/Program_1/perl1_Ac3.cgi" method="post">';
print 'Select the Unit that you want to convert to by selecting radio button ';
print br,br,'Enter Money spend on Gas ';
print '<input type="number" size ="15" name ="Money" Min="0" Max="100">';
print br, 'Enter quantity of gas purchase ';
print '<input type="number" size ="15" name ="Gas" Min="0" Max="100">';
print br,br,'Converting from';
print '<input type="radio" name="Conversion" value="US"> US';
print  '<input type="radio" name="Conversion" value="Canada"> Canada';
print br,'Converting to';
print '<input type="radio" name="Conversion1" value="US1"> US';
print  '<input type="radio" name="Conversion1" value="Canada1"> Canada';

print br,br, 'Current Exchange Rate: ';
print br,' 1 USA dollar =';
print '<input type="text" size ="8" name ="Rate" Min="0">';
print 'Canadian dollars';
print br,'<input type="submit" value="Conversion">';
print '<input type="reset" value="Reset">';

print '</form>',end_html;
