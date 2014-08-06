#!/usr/bin/perl  
# Toan Nguyen
# CSCI 342 
# Generate and print the output 
use CGI ':standard';
print header;
print start_html('Quiz result'); 
print h1('This is the result of your Quiz');

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

$KEY= param('item');
$KEY2=param('item2');
$KEY3=param('item3');
$KEY4=param('item4');
$KEY5=param('item5');
$right = 0;
	if ($Question1{$KEY} eq "C. Blue whale")
	{
		$right = $right + 1;
	}
	if ($Question2{$KEY2} eq "D. Turritopsis nutricula jellyfish")
	{
		$right = $right + 1;
	}
	
	if ($Question3{$KEY3} eq "A. West African black rhino")
	{
		$right = $right + 1;
	}
	
	if ($Question4{$KEY4} eq "C. 70-75 mph")
	{
		
		$right = $right + 1;
	}
	
	if ($Question5{$KEY5} eq "D. > 3 hours")
	{
		
		$right = $right + 1;
	}
		
print br, "Number of Answers Correct are: $right";
$percent = ($right / 5) * 100;
print br, "The total percent is: $percent%",br;

print br, "List of Questions and Answers";
print br,"1.What is the biggest mammal in the world?";
print br,"Your Answer is $Question1{$KEY} and the correct answer is C. Blue Whale",br;

print br,"2.What is the animal live longest in the world?";
print br,"Your Answer is $Question2{$KEY2} and the correct answer is D. Turritopsis nutricula jellyfish",br;

print br,"3.What is the animal extinct in the last decade?";
print br,"Your Answer is $Question3{$KEY3} and the correct answer is A. West African black rhino",br;

print br,"4.What is the fastest speed a cheetah can reach?";
print br,"Your Answer is $Question4{$KEY4} and the correct answer is C. 70-75 mph",br;

print br,"5.How long an eagle can fly without landing?";
print br,"Your Answer is $Question5{$KEY5} and the correct answer is D. > 3 hours",br;

print end_html;
