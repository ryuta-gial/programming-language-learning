const a = [
    { id: 1, category: "animal", kind: "dog" },
    { id: 2, category: "fruit", kind: "apple" },
    { id: 3, category: "fruit", kind: "orange" },
    { id: 4, category: "animal", kind: "dog" },
    { id: 5, category: "animal", kind: "cat" },
    { id: 6, category: "fruit", kind: "grape" },
    { id: 7, category: "animal", kind: "cat" }
];

let b = a.filter(
    (x, y, z) => z.slice(0, z.length).filter(w => w.kind == x.kind).length >= 2
);

console.log(b);
