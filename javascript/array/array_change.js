let arra = [
  {
    id: 1,
    name: "yamada",
    pass: "test",
  },
  {
    id: 2,
    name: "moriya",
    pass: "test",
  },
];

const likes = arra.map((item) => {
  return (item.id = String(item.id));
});

const result = arra.reduce((prev, current) => {
  const { id, name, pass } = current;

  prev.push({ id: String(id), name, pass });
  return prev;
}, []);
console.log(result);
