import re

s = 'aaa@xxx.com, bbb@yyy.com,ccc@zzz.net'

m = re.match(r'([a-z]+)@([a-z]+)\.com', s)
print(m)
# <re.Match object; span=(0, 11), match='aaa@xxx.com'>

result = re.sub(r'([a-z]+)@([a-z]+)\.com', 'new-address', s)
print(result)



pattern = r"spam"

if re.match(pattern, "spamspamspam"):
   print("Match")
else:
   print("No match")


pattern = r"spam"

if re.match(pattern, "eggspamsausagespam"):
   print("Match")
else:
   print("No match")

if re.search(pattern, "eggspamsausagespam"):
   print("Match")
else:
   print("No match")
    
print(re.findall(pattern, "eggspamsausagespam"))
