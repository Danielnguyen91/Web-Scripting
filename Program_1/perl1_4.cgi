#!/usr/bin/perl
# Toan Nguyen
# CSCI 342
# perl1_4 enter the password and print out the output if password is right
use CGI ":standard";
print header;
print start_html("perl1_4");
print '<form action="http://sw.cs.wwu.edu/~nguyen82/cgi-bin/Program_1/perl1_Ac4.cgi" method="post">';
print '<font color="BLUE" size=4> Enter password to see output <BR>';
print '<input type="password" size="15" name="passwd">';
print br, '<input type=SUBMIT VALUE="Click To Submit">';
print '<input type=RESET VALUE="Reset">';
print '</form>', end_html;
