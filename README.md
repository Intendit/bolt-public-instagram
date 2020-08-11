Instagram
======================

This extension will get raw feed data from Instagram's basic display API. This extension is upgraded from [Vinkla's Instagram Package](https://github.com/vinkla/instagram).

### Requirements
- PHP 7+
- Bolt 3+

### Configuration
Configuration requires valid access token and user id from Instagram, otherwise they will not work.

### Example
```
    {% set instagramapi = instagramgraphtoken(10) %} 
    {% for post in instagramapi.data %} 
    {% if post.media_type == "VIDEO" %}

    <div class="three s-four xs-six album-bild popup-boxes insta__video video">
        <div class="popup ajax openpopup-{{post.id}}" data-id="{{post.id}}">
            <div class="video__icon">
            {{ fau('play', 'solid', 'white', "24") }}
            </div>
            <div class="info align bottom right">                
            </div>
            <img src="{{image(remoteimage(url=post.thumbnail_url), 640, 640, 'c')}}"  alt="Instagram bild"/> 
            <div class="insta__video__content popupinfo pop-child-{{ post.id }}">
                <div>
                    <video controls autoplay muted>
                        <source src="{{ post.media_url }}" type="video/mp4">
                    </video>
                    <div class="video__caption">
                        {{ post.caption }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {% else %}
    <a class="three s-four xs-six album-bild popup image zoom" href="{{ image(remoteimage(url=post.media_url), 640, 640,'r')}}" title="{{ post.caption }}"> 
        <div class="info align bottom right">                
        </div>
        <img src="{{image(remoteimage(url=post.media_url), 400, 400,'c')}}"  alt="Instagram bild"/>  
    </a>
    {% endif %}
    {% endfor %}
```
