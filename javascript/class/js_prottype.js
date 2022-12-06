var Phone = function( name, model, color) { this. name = name; this. model = model; this. color = color;
};

Phone. prototype = { 
getName : function() {return this. name;},
getModel : function() {return this. model;}, 
getColor : function() {return this. color;} 
}

var featurePhone = new Phone(' feature phone', 'X-X', 'black');
var smartPhone = new Phone(' smart phone', 'XX-XX', 'red');
 
 console. log( featurePhone. getModel()); // X-X 
 console. log( smartPhone. getColor()); // red

