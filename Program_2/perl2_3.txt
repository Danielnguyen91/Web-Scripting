#!/usr/bin/perl  
# Toan Nguyen
# CSCI 342 
# Receive the text file and send the perl2_Ac3 to generate the output
use CGI ':standard';
print header;
print start_html('Read text file');
print '<form action="http://sw.cs.wwu.edu/~nguyen82/cgi-bin/Program_2/perl2_Ac3.cgi" method="post">';
print br, "Enter the file name you want to read";
print br,br,'<input type ="Text" size ="15" name ="file" >';
print br,br,'<input type="submit" value="Submit">';
print '<input type="reset" value="Erase">';
print '</form>';

print end_html; 
