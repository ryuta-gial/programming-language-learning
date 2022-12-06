let users = [
    { name: 'yuki', hometown: 'Osaka' },
    { name: 'taro', hometown: 'Tokyo' },
    { name: 'hanako', hometown: 'Osaka' },
    { name: 'zirou', hometown: 'Nagoya' },
];
const hasElement = (hometown) => (x) => x.hometown === hometown;
const osaka = users.filter(hasElement('Osaka')); // xを省略できる。
console.log(osaka);
