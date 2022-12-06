let myCar = {}
myCar.make = "Ford";
myCar.model = "Mustang";
myCar.year = "1969";

const showProps = (obj,objName) =>{
    let result = "";
    for(let i in obj){
        if(obj.hasOwnProperty(i)){
            result += objName + "." + i + "=" + obj[i]  + "\n";
        }
    }
    return result;
}

console.log(showProps(myCar,"myCar"));
