#include <bits/stdc++.h>
using namespace std;

// 2つの引数のうち最も小さい値を返す
int my_min(int x, int y) {
  if (x < y) {
    return x;
  }
  else {
    return y;
  }
}

// 3つの引数のうち最も小さい値を返す
int my_min(int x, int y, int z) {
  if (x < y && x < z) {
    return x;
  }
  else if (y < x && y < z) {
    return y;
  }
  else {
    return z;
  }
}

int main() {
  int answer = my_min(10, 5); // 2つの引数
  cout << answer << endl; // 5

  answer = my_min(3, 2, 5); // 3つの引数
  cout << answer << endl; // 2
}
