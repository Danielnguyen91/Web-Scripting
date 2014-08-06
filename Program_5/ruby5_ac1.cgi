#!/usr/local/bin/ruby
#Toan Nguyen
# Ruby program that display all the output that get from the website
require 'uri'
require 'cgi'
require 'open-uri'
require 'net/https'
require 'openssl'
require 'rexml/document'
include REXML



uri = URI.parse('https://www.nrd.gov/jobSearch/raw/jobSearch')
OpenSSL::SSL::VERIFY_PEER = OpenSSL::SSL::VERIFY_NONE

cgi = CGI.new
key_value = cgi['key_text']
place = cgi['Location_text']
nearby = cgi['nearby_text']
offset = cgi['offset_text']
industry = cgi['industry_text']
catagory = cgi['occu_text']


uri.query = [uri.query,'q=' + key_value.gsub(" ","+")].compact.join('&')
uri.query = [uri.query,"location=" + place.gsub(" ","+")].compact.join('&')
if nearby.eql? "1"  
uri.query = [uri.query,"includeNearbyCities=on"].compact.join('&') 
end
uri.query = [uri.query,"jobposting-industry=" + industry.gsub(" ","+")].compact.join('&')
uri.query = [uri.query,"jobposting-occupationalcategory=" + catagory.gsub(" ","+")].compact.join('&')
uri.query = [uri.query,"offset=" + offset].compact.join('&')
uri.query = [uri.query,"datePosted=60"].compact.join('&')
uri.query = [uri.query,"sort=jobposting-dateposted"].compact.join('&')
uri.query = [uri.query,"order=desc"].compact.join('&')
#puts "Content-type: text/xml" 
#puts

http = Net::HTTP.new(uri.host, uri.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE
request = Net::HTTP::Get.new(uri.request_uri)





response = http.request(request)
xml_data = response.body
doc = Document.new(xml_data)

#puts "Content-type: text/html"
#puts



title = []
date = []
state = []
city = []
salary = []
job = []
location = []
money = []
doc.elements.each("map/entry/jobPostings/jobSearchPosting/title") { |e| title << e.text  }
doc.elements.each("map/entry/jobPostings/jobSearchPosting/datePosted") { |e| date << e.text }
doc.elements.each("map/entry/jobPostings/jobSearchPosting/addressRegion") { |e| state << e.text }
doc.elements.each("map/entry/jobPostings/jobSearchPosting/addressLocality") { |e| city << e.text }
doc.elements.each("map/entry/jobPostings/jobSearchPosting/baseSalary") { |e| salary << e.text  }
doc.elements.each("map/entry/jobPostings/jobSearchPosting/occupationalCategory") { |e| job << e.text }


city.each_with_index do | e, index|
str2 = "#{city.at(index)}"
str = "https://www.google.com/maps?q=" + CGI.escape(str2)
str.gsub!(/(https:\/\/\S+)/, '<a href="\1" target="_blank">' + str2 + '</a>')
location << str
end

salary.each_with_index do |e, index|
str3 = "#{salary.at(index)}"
str3.gsub!(/(\d)(?=(\d{3})+(?!\d))/, '\\1,')
str4 = "\$" + str3
money << str4
end



cgi = CGI.new("html4")

cgi.out {
    cgi.html {
      cgi.head { cgi.title{"Search Job Bank"} } + "\n" + 
      cgi.body { "\n" + 
          cgi.h1 { "Jobs from VA databank" } + "\n" +
          cgi.table("border"=>"3"){
          cgi.tr {
		 cgi.td {"City"} + 
		 cgi.td {"State"} +
		 cgi.td {"Date Posted"} +
		 cgi.td {"Base Salary"} +
		 cgi.td {"Job"} +
		 cgi.td {"Title"} } + 
          cgi.tr {
		 cgi.td { cgi.p {location.at(0)}  } + 
		 cgi.td {cgi.p {"#{state.at(0)}"} } +
		 cgi.td {cgi.p {"#{date.at(0)}"}} +
		 cgi.td {cgi.p {money.at(0)}} +
		 cgi.td {cgi.p {"#{job.at(0)}"}} +
		 cgi.td {cgi.p {"#{title.at(0)}"}} } +
	 cgi.tr {
		 cgi.td { cgi.p {location.at(1)}  } + 
		 cgi.td {cgi.p {"#{state.at(1)}"} } +
		 cgi.td {cgi.p {"#{date.at(1)}"}} +
		 cgi.td {cgi.p {money.at(1)}} +
		 cgi.td {cgi.p {"#{job.at(1)}"}} +
		 cgi.td {cgi.p {"#{title.at(1)}"}} }  +
	 cgi.tr {
		 cgi.td { cgi.p {location.at(2)}  } + 
		 cgi.td {cgi.p {"#{state.at(2)}"} } +
		 cgi.td {cgi.p {"#{date.at(2)}"}} +
		 cgi.td {cgi.p {money.at(2)}} +
		 cgi.td {cgi.p {"#{job.at(2)}"}} +
		 cgi.td {cgi.p {"#{title.at(2)}"}} }  +
	 cgi.tr {
		 cgi.td { cgi.p {location.at(3)}  } + 
		 cgi.td {cgi.p {"#{state.at(3)}"} } +
		 cgi.td {cgi.p {"#{date.at(3)}"}} +
		 cgi.td {cgi.p {money.at(3)}} +
		 cgi.td {cgi.p {"#{job.at(3)}"}} +
		 cgi.td {cgi.p {"#{title.at(3)}"}} }   +
 	   cgi.tr {
		 cgi.td { cgi.p {location.at(4)}  } + 
		 cgi.td {cgi.p {"#{state.at(4)}"} } +
		 cgi.td {cgi.p {"#{date.at(4)}"}} +
		 cgi.td {cgi.p {money.at(4)}} +
		 cgi.td {cgi.p {"#{job.at(4)}"}} +
		 cgi.td {cgi.p {"#{title.at(4)}"}} }  +
	  cgi.tr {
		 cgi.td { cgi.p {location.at(5)}  } + 
		 cgi.td {cgi.p {"#{state.at(5)}"} } +
		 cgi.td {cgi.p {"#{date.at(5)}"}} +
		 cgi.td {cgi.p {money.at(5)}} +
		 cgi.td {cgi.p {"#{job.at(5)}"}} +
		 cgi.td {cgi.p {"#{title.at(5)}"}} }  +
	 cgi.tr {
		 cgi.td { cgi.p {location.at(6)}  } + 
		 cgi.td {cgi.p {"#{state.at(6)}"} } +
		 cgi.td {cgi.p {"#{date.at(6)}"}} +
		 cgi.td {cgi.p {money.at(6)}} +
		 cgi.td {cgi.p {"#{job.at(6)}"}} +
		 cgi.td {cgi.p {"#{title.at(6)}"}} }  +
	 cgi.tr {
		 cgi.td { cgi.p {location.at(7)}  } + 
		 cgi.td {cgi.p {"#{state.at(7)}"} } +
		 cgi.td {cgi.p {"#{date.at(7)}"}} +
		 cgi.td {cgi.p {money.at(7)}} +
		 cgi.td {cgi.p {"#{job.at(7)}"}} +
		 cgi.td {cgi.p {"#{title.at(7)}"}} } +
	 cgi.tr {
		 cgi.td { cgi.p {location.at(8)}  } + 
		 cgi.td {cgi.p {"#{state.at(8)}"} } +
		 cgi.td {cgi.p {"#{date.at(8)}"}} +
		 cgi.td {cgi.p {money.at(8)} } +
		 cgi.td {cgi.p {"#{job.at(8)}"}} +
		 cgi.td {cgi.p {"#{title.at(8)}"}} } + 
	 cgi.tr {
		 cgi.td { cgi.p {location.at(9)}  } + 
		 cgi.td {cgi.p {"#{state.at(9)}"} } +
		 cgi.td {cgi.p {"#{date.at(9)}"}} +
		 cgi.td {cgi.p {money.at(9)}} +
		 cgi.td {cgi.p {"#{job.at(9)}"}} +
		 cgi.td {cgi.p {"#{title.at(9)}"}} } 
          } 
	 
      } 
     
    }
 }



