#include <bits/stdc++.h>
using namespace std;

// 入力例
//  3
//  5 2
//  2 7
//  4 1

int main() {
  int N;
  cin >> N;
  vector<pair<int, int>> p(N);
  for (int i = 0; i < N; i++) {
    int a, b;
    cin >> a >> b;
    p.at(i) = make_pair(b, a);  // b, a の順でペアにする
  }

  sort(p.begin(), p.end());

  for (int i = 0; i < N; i++) {
    int b, a;
    tie(b, a) = p.at(i);  // b, a の順であることに注意
    cout << a << " " << b << endl;
  }
}
