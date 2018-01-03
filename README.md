Instagram
======================

This [bolt.cm](https://bolt.cm/) extension will get raw feed data from Instagram's public API. It makes use of [Vinkla's Instagram Package](https://github.com/vinkla/instagram).

### Installation
1. Login to your Bolt installation
2. Go to "Extend" or "Extras > Extend"
3. Type `instagram` into the input field
4. Click on the extension name
5. Click on "Browse Versions"
6. Click on "Install This Version" on the latest stable version

### Requirements
- PHP 7+
- Bolt 3+

### Configuration
Nothing to configure, just call the `{{ instagram('username') }}` twig function where `username` is the user profile you want to retreive.
This will return an array of the latests posts in that profile.
There are also functions called `{{ instagrammediatoken(accesstoken, limit) }}` (Gets media from instagram account linked with the accesstoken) and `{{ instagramtagstoken(tag, token, limit) }}` (Gets media from tagged posts. Remember that the access token will also need to authorize scope `public_content`). 

### Example
```
{% for post in instagram('marutaro') %}
  {{ dump(post) }}
{% endfor%}

{% for post in instagrammediatoken('access_token', '10') %}
  {{ dump(post) }}
{% endfor%}

{% for post in instagramtagstoken('marutaro', 'access_token', '10') %}
  {{ dump(post) }}
{% endfor%}
```

### Notes
Because this extension uses Instagram's public API it has the following limitations (only on `instagram('username')`):
- You can only fetch feeds from public accounts.
- You can only retrieve the lastest 12 posts.

`instagrammediatoken` and `instagramtagstoken` requires valid access token from Instagram, otherwise they will not work.
