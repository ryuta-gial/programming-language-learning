#include <bits/stdc++.h>
using namespace std;

int main() {
  int N;
  cin >> N;
  vector<int> A(N);

  // O(N)
  for (int i = 0; i < N; i++) {
    cin >> A.at(i);
  }

  // O(N log N)
  sort(A.begin(), A.end());

  // O(N)
  for (int i = 0; i < N; i++) {
    cout << A.at(i) << endl;
  }
}
