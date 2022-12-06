import math

print(math.sin(math.pi/4))
print(math.cos(math.pi/4))
print(math.tan(math.pi/4))

# 円の周を計算する
def circle_round(radius):
  return 2 * math.pi * radius

# 円の面積を計算する
def circle_area(radius):
  return math.pi * radius * radius

if __name__ == '__main__':
  print(circle_round(4))
  print(circle_area(4))
