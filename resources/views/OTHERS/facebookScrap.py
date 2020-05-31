import base64
def sendTextToPhp(text):
 text=text.encode(encoding='UTF-8',errors='strict')
 text=base64.b64encode(text)
 text=str(text)[2:-1:]
 return text
texts=[]
images=[]
urls=[]
from facebook_scraper import get_posts
for post in get_posts('Conseil.Arrondissement.Agdal.Ryad', pages=2):
 texts.append((post['text']))
 images.append(post['image'])
posts=''
for i in range(len(texts)):
  posts += ''+texts[i].replace('\n',' . ')+' || '+str(images[i])+' }||{ '
print(sendTextToPhp(str(posts)))
