<?php
function getPreviewYoutubeFromLink($link, $imageSize = 'hqdefault')
{
    $link = getLinkVideo($link);

    return 'https://img.youtube.com/vi/' . $link . '/' . $imageSize . '.jpg';
}

function getYoutubeIframe($link)
{
    $code = getLinkVideo($link);
    return '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/' . $code . '"
			 frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
			 allowfullscreen></iframe>';
}

function getLinkVideo($link)
{

    if(strpos($link, '&feature=youtu.be') !== false){
        $link =str_replace('&feature=youtu.be', '', $link);
    }
    if (strpos($link, '&list=') !== false) {
        $res = explode('&list=', $link)[0];
        $res = str_replace('https://www.youtube.com/watch?v=', '', $res);
        return $res;
    }
    if (strpos($link, 'https://m.youtube.com/watch?v=') !== false) {
        $res = str_replace('https://m.youtube.com/watch?v=', '', $link);

        return $res;
    }
    if (strpos($link, 'https://youtu.be/') !== false) {
        $res = str_replace('https://youtu.be/', '', $link);
        return $res;
    }
    $res = str_replace('https://www.youtube.com/watch?v=', '', $link);


    return $res;
}
