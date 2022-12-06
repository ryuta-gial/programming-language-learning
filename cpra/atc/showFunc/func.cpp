#include <bits/stdc++.h>
using namespace std;

int main(){
  int a, b, c;
  cin >> a >> b >> c;

  int maximum = max(max(a,b),c); //最大値を計算
  int minimum = min(min(a,b),c);//最小値を計算

  cout << maximum - minimum << endl;
}
