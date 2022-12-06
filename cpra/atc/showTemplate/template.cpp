#include <bits/stdc++.h>
using namespace std;

// xの二乗を返す (関数テンプレート版)
template <typename T>
T square(T x) {
  return x * x;
}

int main() {
  int a = 3;
  double b = 1.2;

  cout << square<int>(a) << endl;  // int版のsquare関数の呼び出し
  cout << square<double>(b) << endl;  // double版のsquare関数の呼び出し
}
