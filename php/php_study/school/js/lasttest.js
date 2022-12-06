function calc( ){
var cec= []
for(s=1; s<21; s++){
   cec[s] = document.getElementsByName("q"+s);
   }
   //console.log(cec[20]);
var con = [];
for(s=1; s<21; s++){
for(i=0; i<cec[s].length; i++){
if(cec[s][i].checked){
con[s] = parseInt(cec[s][i].value) ;


}
}
} 

var cont = con[4]+ con[7]+ con[17] + con[19] + con[20] -11;
var pro = con[2] + con[6] + con[8] + con[11] + con[14] -12;
var ses = con[3] + con[9] + con[13] + con[16] + con[18] -12;
var ana = con[1] + con[5] + con[10] + con[12] + con[15] -13;
var mae = Math.max(cont,pro,ses,ana);
if(isNaN(cont)){
	cont = 0;
	mae = "すべてに必ずチェックをいれてください";	
}

if(isNaN(pro)){
	pro = 0;
	mae = "すべてに必ずチェックをいれてください";	
	
}

if(isNaN(ses)){
	ses = 0;
	mae = "すべてに必ずチェックをいれてください";	
}

if(isNaN(ana)){
	ana = 0;
	mae = "すべてに必ずチェックをいれてください";	
}

if(cont==mae)
{
	mae = "あなたのタイプはコントローラーです";
}
if(pro==mae)
{
	mae = "あなたのタイプはプロモーターです";
}
if(ses==mae)
{
	mae = "あなたのタイプはサポーターです";
}
if(ana==mae)
{
	mae = "あなたのタイプはアナライザーです";
}
window.alert(mae);
history.back() ;
}
