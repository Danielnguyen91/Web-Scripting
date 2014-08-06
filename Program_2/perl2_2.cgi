#!/usr/bin/perl  
# Toan Nguyen
# CSCI 342  
# Program perl2_2 create the multiple choice quiz
use CGI ':standard';
print header;
print start_html('Puzzle Animal Quiz'); 
print 'Puzzle Animal Quiz';
%Question1 =  (
        A => 'A. Elephant',
        B1 => 'B. White shark' ,
        C =>  'C. Blue whale',                  
        D4 => 'D. Lion',
	E8 => 'E. Gorilla' 
);
%Question2 =  (
        A => 'A. Geoduck',
        B1 => 'B. Lamellibrachia tube worms',
        C =>  'C. Red sea urchins',                  
        D4 =>  'D. Turritopsis nutricula jellyfish',
	E8 =>  'E. Ocean quahog' 
);
%Question3 =  (
        A =>  'A. West African black rhino',
        B1 =>  'B. Tiger',
        C =>  'C. Aligator',                  
        D4 =>  'D. Kangaroo',
	E8 =>  'E. Apes' 
);
%Question4 =  (
        A =>  'A. 80-85 mph',
        B1 =>  'B. 55-60 mph',
        C =>  'C. 70-75 mph',                  
        D4 =>  'D. 90-95 mph',
	E8 =>  'E. 45-50 mph' 
);
%Question5 =  (
        A =>  'A. < 1 hour',
        B1 =>  'B. 1-2 hours',
        C =>  'C. 2-3 hours',                  
        D4 =>  'D. > 3 hours',
	E8 =>  'E. As long as it want' 
);
print '<form action="http://sw.cs.wwu.edu/~nguyen82/cgi-bin/Program_2/perl2_Ac2.cgi" method="post">';
print '<Font size=4 > Choose the best answer', br;
print '1.What is the biggest mammal in the world?',br;
foreach $item (keys %Question1) {
    	     $Answer=$Question1{$item};
      print "<input TYPE=radio NAME=\"item\" value= $item > $Answer", br;
}
print '2.What is the animal live longest in the world?',br;
foreach $item2 (keys %Question2) {
    	    $Answer=$Question2{$item2};
    	 
      print "<input TYPE=radio NAME=\"item2\" value= $item2 > $Answer", br;

}
print '3.What is the animal extinct in the last decade?',br;
foreach $item3 (keys %Question3) {
    	      $Answer=$Question3{$item3};
      print "<input TYPE=radio NAME=\"item3\" value= $item3 > $Answer", br;

}
print '4.What is the fastest speed a cheetah can reach?',br;
foreach $item4 (keys %Question4) {
    	     $Answer=$Question4{$item4};
      print "<input TYPE=radio NAME=\"item4\" value= $item4 > $Answer", br;

}
print '5.How long an eagle can fly without landing?',br;
foreach $item5 (keys %Question5) {
    	     $Answer=$Question5{$item5};
      print "<input TYPE=radio NAME=\"item5\" value= $item5 > $Answer", br;

}

print br, '<input TYPE=SUBMIT value="Click To Submit">';
print '<input TYPE=RESET value="Reset">';
print '</form>';
print end_html;

