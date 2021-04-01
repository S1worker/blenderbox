<footer class="footer">
  <div class="footer__inner">
    <div class="footer__head">
      <div class="footer__head__logo">
        <img class="footer__head__logo__image" srcset="{{$get_footer['logo_image']}}" alt="{{$site_name}}">
        <p class="footer__head__logo__text">{!! $get_footer['logo_text'] !!}</p>
      </div>
      <div class="footer__head__links">
        <h6 class="footer__head__links__title">{{$get_footer['about_title']}}</h6>
        @foreach($get_footer['about_links'] as $item)
          <a href="{{$item['link']['url']}}" target="{{$item['link']['target']}}" class="footer__head__links__item">{{$item['link']['title']}}</a>
        @endforeach
      </div>
      <div class="footer__head__links">
        <h6 class="footer__head__links__title">{{$get_footer['academics_title']}}</h6>
        @foreach($get_footer['academics_links'] as $item)
          <a href="{{$item['link']['url']}}" target="{{$item['link']['target']}}" class="footer__head__links__item">{{$item['link']['title']}}</a>
        @endforeach
      </div>
      <div class="footer__head__links">
        <h6 class="footer__head__links__title">{{$get_footer['explore_title']}}</h6>
        @foreach($get_footer['explore_links'] as $item)
          <a href="{{$item['link']['url']}}" target="{{$item['link']['target']}}" class="footer__head__links__item">{{$item['link']['title']}}</a>
        @endforeach
      </div>
      <div class="footer__head__social">
        <h6 class="footer__head__social__title">{{$get_footer['social_title']}}</h6>
        <div class="footer__head__social__list">
          <a href="{{$get_footer['social_linkedin']}}" class="footer__head__social__item footer__head__social__item--linkedin" target="_blank"></a>
          <a href="{{$get_footer['social_facebook']}}" class="footer__head__social__item footer__head__social__item--facebook" target="_blank"></a>
          <a href="{{$get_footer['social_instagram']}}" class="footer__head__social__item footer__head__social__item--instagram" target="_blank"></a>
          <a href="{{$get_footer['social_twitter']}}" class="footer__head__social__item footer__head__social__item--twitter" target="_blank"></a>
        </div>
      </div>
    </div>
    <div class="footer__bottom">
      <div class="footer__bottom__links">
        @foreach($get_footer['rights_links'] as $item)
          <a href="{{$item['link']['url']}}" target="{{$item['link']['target']}}" class="footer__bottom__links__item">{{$item['link']['title']}}</a>
        @endforeach
      </div>
      <p class="footer__bottom__text">{!! $get_footer['rights_center_text'] !!}</p>
      <p class="footer__bottom__text">{!! $get_footer['rights_by'] !!}</p>
    </div>
  </div>
</footer>
