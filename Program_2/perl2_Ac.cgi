#!/usr/bin/perl  
# Toan Nguyen
# CSCI 342  
# Generating url to the link            
use CGI ':standard';
use LWP::Simple;
use CGI::Carp "fatalsToBrowser";
print header;
print start_html("Generating URL link");
my $url = param("URL");
$count = 0;
$countim = 0;
if ($url eq '') { print "Enter the URL link to generate";}
else {

if ($url =~ m/^http:\/\/www.+$/)
{
	$url = $url;
}
elsif ($url =~ m/^www.+$/)
{
	$url = 'http://'. $url;
}	
else
{
	$url = 'http://www.'. $url;
}

my $sou = get($url) or die print "cannot retrieve the URL link<br/>";
my @urls = ($sou =~ /[\shref="|\ssrc="](http:\/\/[^\s>"]+)/gi);

print "The following absolute URLs are present in the document";
$url =~ s!(http://[^\s]+)!<a href="$1">$1</a>!gi;
print br,br,$url,br;

foreach my $link (@urls){
	
	$link =~ s!((http://|https://)[^\s]+)!<a href="$1">$1</a>!gi;
	$count ++;
	print br,"URL # $count: $link";
	
}


print br,br,"The GIF file in this page are",br;
foreach my $image (@urls) {
		
	if($image =~ /([^\/:]+\.(?i:gif|GIF))/) 
	{ 
		$countim ++;
		print br,"# $countim $1"; 
	}
} 
if ($countim == 0)
{
	print "There are no gif in this page";
}
}
print end_html;
