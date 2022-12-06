#include <bits/stdc++.h>
using namespace std;

//3 200
//100 100 100
//100 100 100

//9

int main() {
  int N, S;
  //入力
  cin >> N >> S;
  // N個の入力を受け取れるように N要素の配列 {N, N, N} で初期化
  vector<int> A(N), P(N);
  for (int i = 0; i < N; i++) {
    // atを使ってiつずつ入力
    cin >> A.at(i);
  }
  for (int i = 0; i < N; i++) {
    cin >> P.at(i);
  }
  // リンゴ・パイナップルをそれぞれ1つずつ購入するとき合計S円になるような買い方が何通りあるか
  int ans = 0;  // 買い方が何通りあるか

  // 実際に全ての買い方を試してみて、合計がS円ならカウントアップ
  for (int x : A) {
    for (int y : P) {
      if (x + y == S) {
        ans++;
      }
    }
  }
//範囲for文
  cout << ans << endl;
}
