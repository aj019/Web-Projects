/*alert("Yes");
number="zx";
name="Simranjeet";
if (name) 
	{
		alert("Yes\n"+name);
	};

if(isNaN(number))  //is not a Number
{
	alert("String");
}


switch()
{
	case 1:
	break;
	case 2:
	break;
}

*/
string="";
for (var i = 0; i <= 3; i++) 
{
	for (var j = 3; j>=0; j--) 
	{
		if (i<j) 
			string+=" ";			

		else
			string+="* ";
	};
	string+="\n";
};

alert(string);

