@extends('layouts.app')

@section('content')
<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m"
  style="background-image: url({{ asset('storage/media/heading-pages-06.jpg') }});">
  <h2 class="l-text2 t-center">
    About
  </h2>
</section>

<!-- content page -->
<section class="bgwhite p-t-66 p-b-38">
  <div class="container">
    <div class="row">
      <div class="col-md-4 p-b-30">
        <div class="hov-img-zoom">
          <img src="{{ asset('storage/media/banner-14.jpg') }}" alt="IMG-ABOUT">
        </div>
      </div>

      <div class="col-md-8 p-b-30">
        <h3 class="m-text26 p-t-15 p-b-16">

          WHAT IS FIGURE?
        </h3>

        <p class="p-b-28">
          A figure is a doll-like toy designed to resemble characters from movies, games, or comics. One of the most
          popular forms of entertainment for manga and anime lovers, in Japan they are called Otaku. However, in Vietnam
          is still quite new and not many people know about it. Figures are divided into several categories such as
          Scale Figures (Static Figures), Chibi Figures (chibi models) and Action Figures (with movable joints). </p>

        <h3 class="m-text26 p-t-15 p-b-16">
          LEARN ACTION FIGURE HISTORY
        </h3>
        <p class="p-b-28">
          The term action figure was first used in 1964 by Don Levine of Hasbro Company to describe their new GI Joe
          toys. Levine prefers the name of an action figure instead of calling it a doll because it attracts players
          regardless of gender. Conceptually, the original Joe Model resembles Mattel's Barbie doll, introduced 5 years
          ago. However, the Action Figure has better articulation, a trait that makes it attractive because the model
          can be bent to create different poses. Moreover, Joe is equipped with many accessories and outfits based on
          real-life military equipment models. GI Joe is a classic model and characters from the work are added to this
          series. Until now GI Figure Action Figure GI Joe is still very popular and sought after by collectors.
          <p class="p-b-28">
            GI Joe was inherited by Captain Action in 1966, and it's worth noting that Captain Action is an Action
            Figure that can transform into many different characters. The figure is sold with costumes and accessories
            that imitate celebrities such as Phantom, Captain America, Batman, Superman and Spiderman. Captain Action is
            the first figure to combine superhero characters in just one product, a trend that continues today.
            <p class="p-b-28">
              In 1977, Twentieth Century Fox licensed a toy license to Kenner to produce action figures based on the new
              Star Wars movie. The success of the film significantly expanded the toy market and secured the popularity
              of these figures. Before Star Wars, action figures were usually 8-12 in (20-30 cm) tall, but Kenner
              designed their characters to be only 3.75 in (9.5 cm) tall. Other manufacturers quickly adopted this new
              figure style. A variety of other film-based and television-based toys were quickly appearing, including
              Star Trek, Battle Star Galactica and Buck Rogers in the 20th Century.
              <p class="p-b-28">
                In 1983, federal regulations banning the production of toys of this type for children were abolished.
                This has opened a new era for action figure model toys. Mattel took this opportunity and created an
                animated series based on their 1981 action figures called "He-Man and the Masters of the Universe".
                These toys were extremely successful and sold over 55 million units that year. These numbers continued
                to sell until 1990, generating more than $ 1 billion in revenue. Several other toys made into cartoons
                have achieved similar success.
                <p class="p-b-28">

                  With the 1984 release of the "Transformers" series, action figures have reached a new level of
                  sophistication. Transformers are robots that can turn themselves into other objects, such as fighters,
                  tanks or race cars. Since 1984, the Transformers series has launched many generations of different
                  toys and continues to be popular up to now.
                  <div class="bo13 p-l-29 m-l-9 p-b-10">
                    <p class="p-b-11">
                      Through this article, you probably have a basic grasp of what Action Figure is, right? If you're
                      interested, why not collect your favorite character figures today!
                    </p>

                    <span class="s-text7">
                      Jay
                    </span>
                  </div>
      </div>
    </div>
  </div>
</section>
@endsection
