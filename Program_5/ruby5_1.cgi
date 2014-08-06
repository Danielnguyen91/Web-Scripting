#!/usr/local/bin/ruby
require "cgi"
cgi = CGI.new("html4")
cgi.out{
   cgi.html{
      cgi.head{ "\n"+cgi.title{"Ruby5_1 Program"} } +
      cgi.body{ "\n"+
         cgi.form("post","ruby5_ac1.cgi"){"\n"+
            cgi.h1 { "Veterans Job Search API " } + "\n"+
	    cgi.p {"Keyword "  +  cgi.text_field("key_text","","20") } + "\n"  + 
	    cgi.p {"Location "  + cgi.text_field("Location_text","","20") } +"\n"+
	    cgi.p {"includeNearbyCities " +  cgi.text_field("nearby_text","","10") } +"\n"+
	    cgi.p {"Jobposting-industry "  + cgi.text_field("industry_text","","20") } +"\n"+
	    cgi.p {"Jobposting-occupationalcategory "  + cgi.text_field("occu_text","","20") } +"\n"+
	    cgi.p {"Offset (optional default is 10) "  + cgi.text_field("offset_text","","10") } +"\n"+
	    cgi.br + 
            cgi.submit + 
	    cgi.p {" q  == Keywords (EX: q=security+guard)"} +"\n" +
	    cgi.p {" location == Location/ Takes city and state, state, or 5 digit ZIP {Arlington+VA, VA or 22201 } "} + "\n" +
   	    cgi.p {"includeNearbyCities {none or 1}"} + "\n" +
   	    cgi.p {" offset (make a default of 10 if you wish)"} + "\n" +
   	    cgi.p {" jobposting-industry {jobposting-industry=IT}"} + "\n" +
   	    cgi.p {" jobposting-occupationalcategory {jobposting-occupationalcategory=Sales}"}


         }
      }
   }
}
