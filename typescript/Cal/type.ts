console.log("test");
let test: string;

test = "korehatest";

console.log(test);

type nameTypes = {
  myouji: string;
  namae: string;
};

type arrayObj = {
  itemName: { name: string }[];
};

const data: nameTypes = {
  myouji: "shimzu",
  namae: "ryuta",
};

const item: arrayObj = {
  itemName: [{ name: "saba" }, { name: "sanma" }],
};

console.log(item.itemName[0].name);
