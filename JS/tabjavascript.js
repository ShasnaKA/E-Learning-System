var tabbuttons=document.querySelectorAll(".tabcontainer .buttoncontainer button");
var tabpanel=document.querySelectorAll(".tabcontainer .tabpanel");

funtion showpanel(panelIndex,colorCode)
{
	//setting bgcolor and txtcolor of buttons to null at first when page loaded
	tabbuttons.forEach(function(node){
		node.style.backgroundcolor="";
		node.style.color="";
	});
	//set bgcolor and txtcolor of selected buttons to specified color 
	tabbuttons[panelIndex].style.backgroundcolor=colorCode;
	tabbuttons[panelIndex].style.color="#fff";

    //setting display as none to hide tabpanel or container  at first when page loaded
	tabpanel.forEach(function(node){
		node.style.display="none";
	});
     
    //set bgcolor and  display clicked tabpanel or container fully to specified bgcolor 
	tabpanel[panelIndex].style.display="block";
	tabpanel[panelIndex].style.backgroundcolor=colorcode;

	
}

showpanel(0,"#f44336");