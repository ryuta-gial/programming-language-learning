interface User {
  userId: number;
  userName: string;
}

const user1: User = {
  userId: 1,
  userName: "user1",
};

const user2: User = {
  userId: 2,
  userName: "user2",
};

const userMap = new Map<number, User>(); // Map Objectを作成。キーとバリューになる型をジェネリックを使って定義できる。また、定義しなくても型推論してくれる

userMap.set(user1.userId, user1); // UserオブジェクトをMapに登録
userMap.set(user2.userId, user2);

userMap.get(1); // userIdが1のuserを取得
userMap.delete(2); // userIdが2のuserを削除

console.log(userMap);
