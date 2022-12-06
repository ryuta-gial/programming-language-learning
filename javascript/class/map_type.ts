const user1 = {
    userId: 1,
    userName: "user1",
};

const user2 = {
    userId: 2,
    userName: "user2",
};

const userMap1 = new Map(); // Map Objectを作成
userMap1.set(user1.userId, user1); // user1を追加
userMap1.set(user2.userId, user2); // user2を追加

console.log(userMap1);
