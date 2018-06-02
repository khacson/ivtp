var dayarray=new Array ("Sunday","Monday","Tuesday","Wednesday", "Thursday","Friday","Saturday")

var montharray=new Array("January","February","March","April","May","June", "July","August","September","October","November","December")

function getthedate()
{
	var mydate=new Date()
	var year=mydate.getYear()
	if (year < 1000)
		year+=1900
	var day=mydate.getDay()
	var month=mydate.getMonth()
	var daym=mydate.getDate()
	if (daym<10)
		daym="0"+daym
	var hours=mydate.getHours()
	var minutes=mydate.getMinutes()
	var seconds=mydate.getSeconds()
	var dn=""
	if (hours>=12)
		dn=""
	if (hours>12){
		hours=hours-12
	}
	if (hours==0)
	hours=12
	if (minutes<=9)
		minutes="0"+minutes
	if (seconds<=9)
		seconds="0"+seconds
	//Hire change font size
	var cdate=hours+":"+minutes+":"+seconds+" "+dn;
	$("#txttime").html(cdate);
}
function secondsToTime(seconds){
	// extract hours
	var hours = Math.floor(seconds / (60 * 60));
	// extract minutes
	var divisor_for_minutes = seconds % (60 * 60);
	var minutes = Math.floor(divisor_for_minutes / 60);
	// extract the remaining seconds
	var divisor_for_seconds = divisor_for_minutes % 60;
	var seconds = Math.ceil(divisor_for_seconds);

	//Gio
	var hour = hours;
	if (hours < 10)
		hour = "0" + hours;
	//Phut
	var minute = minutes;
	if (minutes < 10)
		minute = "0" + minutes;
	//Giay
	var second = seconds;
	if (seconds < 10)
		second = "0" + seconds;
	return hour + ":" + minute + ":" + second;
}
if (!document.all&&!document.getElementById)
	getthedate()
function goforit(){
	if (document.all||document.getElementById)
		setInterval("getthedate()",1000)
}
goforit();

