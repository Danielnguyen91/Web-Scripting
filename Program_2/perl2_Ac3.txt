#!/usr/bin/perl  
# Toan Nguyen
# CSCI 342 
#Read the text file and print out the various results
use CGI ':standard';
use CGI::Carp "fatalsToBrowser";
print header;
print start_html('File Output');
$fname = param("file");
$wdare = 0;
$iword = 0;
$numword = 0;
$notpword = 0;
$pdword = 0;
#$fname =~ /([^\\\/:*?\"<>|]+)$/;
#$abs = File::Spec->rel2abs( $1);
#$fname =~ /\../\../S+/
print $abs;

if ($fname eq '') { print "Enter the name of file you want to look up"; }
else {
	
       print "This is the result from generating the file:",br;
	
        $ofile = open (INFILE, "<", $fname); 
	while (!defined $ofile) {
		chdir('..') or die "Can't dir or open $fname";
		$ofile = open (INFILE, "<", $fname);
	}
	while (<INFILE>) {
	$infile = $_;
	#$wordcount += scalar(split(/\S+/, $_));
	$wordcount += scalar(split(/\b\W+\b/, $_));
}
@words = split(/\b\W+\b/, $infile);
foreach my $word(@words)
{
	
	 if ($word =~ m/are/)
 	 {
		$wdare = $wdare + 1;
	 }
	
	 if ($word =~ m/(^i\S*n$)/)
	 {
		$iword = $iword + 1;
	 }
	 if ($word =~ m/\d/)
	 {
		$numword = $numword + 1;
	 }
	 if ($word =~ m/^[^p-y]+$/)
	 {
		$notpword = $notpword + 1;
		
	 }
	 if ($word =~ m/\S+p\S*d\S+/)
	 {
		$pdword = $pdword + 1;
	 }
	
}

print br,"The number of words containing in this file: $wordcount";
print br, "The number of words containing the string 'are: $wdare";
print br, "The number of words beginning with a 'i' and ending with a 'n': $iword";
print br, "The number of words containing a 'p' inside the word and followed later in the word by a 'd' inside the word: $pdword"; 
print br, "The number of words containing a number: $numword";
print br,"The number of words not containing the letters 'p' through 'y': $notpword";
close(INFILE);
}
print end_html; 



