import re

pattern = r"[A-Z][A-Z][0-9]"

if re.search(pattern,"LS8"):
    print("Match 1")

if re.search(pattern,"E3"):
    print("Match 2")
if re.search(pattern,"1ab"):
    print("Match 3")

print("区切り")
pattern = r"[^A-Z]"

if re.search(pattern, "this is all quiet"):
   print("Match 1")

if re.search(pattern, "AbCdEfG123"):
   print("Match 2")

if re.search(pattern, "THISISALLSHOUTING"):
   print("Match 3")
