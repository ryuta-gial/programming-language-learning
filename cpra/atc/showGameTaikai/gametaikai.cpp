#include <bits/stdc++.h>
using namespace std;

//入力
//3 2
//1 2
//3 1

int main() {
  int N, M;
  cin >> N >> M;
  vector<int> A(M), B(M);
  for (int i = 0; i < M; i++) {
    cin >> A.at(i) >> B.at(i);
  }

  // N×Nのchar型の2次元配列のすべての要素を'-'で初期化
  vector<vector<char> > table(N, vector<char>(N, '-'));

  for (int i = 0; i < M; i++) {
    // 1〜N → 0〜N-1 に変換
    A.at(i)--; B.at(i)--;
    table.at(A.at(i)).at(B.at(i)) = 'o';  // AはBに勝った
    table.at(B.at(i)).at(A.at(i)) = 'x';  // BはAに負けた
  }

  for (int i = 0; i < N; i++) {
    for (int j = 0; j < N; j++) {
      cout << table.at(i).at(j);
      if (j == N - 1) {
        cout << endl;  // 行末なら改行
      }
      else {
        cout << " ";  // 行末でないなら空白を出力
      }
    }
  }
}
