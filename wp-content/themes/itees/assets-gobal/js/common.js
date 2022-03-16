class CommonHandler {
    constructor() {

    }

    downMediumLargeScreenClipping() {
        window.firstImageHeightMob = 200;
        window.initialImageOffsetMob = window.innerHeight - window.firstImageHeightMob;

        var firstImageclip = gsap.timeline({
            scrollTrigger: {
                id: 'mobileScreenClippingOne',
                trigger: 'section.data',
                start: 'bottom bottom',
                invalidateOnRefresh: true,
                end: () => {
                    var myfirstImageHeightMob = 340;
                    if (globalHandler.matchdown('medium'))
                        myfirstImageHeightMob = 200;
                    if (globalHandler.matchonly('smallSecond'))
                        myfirstImageHeightMob = 0.71 * window.innerWidth - 16;
                    return `bottom ${window.innerHeight - myfirstImageHeightMob}px`;
                },
                scrub: true,
                scroller: `${(globalHandler.mainScrollbar) ? '.scroller' : ''}`,
            }
        })
        .fromTo('main.home .screen-image .inside.one', 
        {clip: () => {
            var myfirstImageHeightMob = 340;
            if (globalHandler.matchdown('medium'))
                myfirstImageHeightMob = 200;
            if (globalHandler.matchonly('smallSecond'))
                myfirstImageHeightMob = 0.71 * window.innerWidth - 16;
            return `rect(0, 100vw, ${myfirstImageHeightMob}px, 0px)`
        }},
        {clip: `rect(0px, 100vw, 0px, 0px)`, ease: 'linear'})

        var secondImageclip = gsap.timeline({
            scrollTrigger: {
                id: 'mobileScreenClippingTwo',
                trigger: 'section.platform',
                start: 'bottom bottom',
                invalidateOnRefresh: true,
                end: () => {
                    var myfirstImageHeightMob = 340;
                    if (globalHandler.matchdown('medium'))
                        myfirstImageHeightMob = 200;
                    if (globalHandler.matchonly('smallSecond'))
                        myfirstImageHeightMob = 0.71 * window.innerWidth - 16;
                    return `bottom ${window.innerHeight - myfirstImageHeightMob}px`;
                },
                scrub: true,
                scroller: `${(globalHandler.mainScrollbar) ? '.scroller' : ''}`,
            }
        })
        .fromTo('main.home .screen-image .inside.two', 
        {clip: () => {
            var myfirstImageHeightMob = 340;
            if (globalHandler.matchdown('medium'))
                myfirstImageHeightMob = 200;
            if (globalHandler.matchonly('smallSecond'))
                myfirstImageHeightMob = 0.71 * window.innerWidth - 16;
            return `rect(0, 100vw, ${myfirstImageHeightMob}px, 0px)`
        }},
        {clip: `rect(0px, 100vw, 0px, 0px)`, ease: 'linear'})
    }

    onlyMediumSectionClipping() {
        var sectionClippingPlatform = gsap.timeline({
            scrollTrigger: {
                id: 'sectionClippingPlatform',
                trigger: 'section.platform .section-in',
                start: `top bottom-=340px`,
                end: 'bottom bottom-=340px',
                scroller: `${(globalHandler.mainScrollbar) ? '.scroller' : ''}`,
                scrub: true,
                invalidateOnRefresh: true,
            }
        })
        .fromTo('section.platform .section-in', {clipPath: () => {
            var sectionHeight = jQuery('section.platform').height();
            return `inset(0px 0px ${sectionHeight}px 0px)`;	
        }},
        {clipPath: "inset(0px 0px 0px 0px)", ease: 'linear'}
        )

        var sectionClippingBenchmarking = gsap.timeline({
            scrollTrigger: {
                id: 'sectionClippingBenchmarking',
                trigger: 'section.benchmarking .section-in',
                start: `top bottom-=340px`,
                end: 'bottom bottom-=340px',
                scroller: `${(globalHandler.mainScrollbar) ? '.scroller' : ''}`,
                scrub: true,
                invalidateOnRefresh: true,
            }
        })
        .fromTo('section.benchmarking .section-in', {clipPath: () => {
            var sectionHeight = jQuery('section.benchmarking').height();
            return `inset(0px 0px ${sectionHeight}px 0px)`;	
        }},
        {clipPath: "inset(0px 0px 0px 0px)", ease: 'linear'}
        )
    }

    downMediumSectionClipping() {
        gsap.timeline({
            scrollTrigger: {
                id: 'sectionClippingPlatform',
                trigger: 'section.platform .section-in',
                start: () => {
                    if (globalHandler.matchonly('smallSecond'))
                        return `top bottom-=${0.71 * window.innerWidth - 16}`

                    return `top bottom-=200px`;
                },
                end: () => {
                    if (globalHandler.matchonly('smallSecond'))
                        return `bottom bottom-=${0.71 * window.innerWidth - 16}`

                    return `bottom bottom-=200px`;
                },
                scroller: `${(globalHandler.mainScrollbar) ? '.scroller' : ''}`,
                scrub: true,
                invalidateOnRefresh: true,
            }
        })
        .fromTo('section.platform .section-in', {clipPath: () => {
            var sectionHeight = jQuery('section.platform').height();
            return `inset(0px 0px ${sectionHeight}px 0px)`;	
        }},
        {clipPath: "inset(0px 0px 0px 0px)", ease: 'linear'}
        )

        gsap.timeline({
            scrollTrigger: {
                id: 'sectionClippingBenchmarking',
                trigger: 'section.benchmarking .section-in',
                start: () => {
                    if (globalHandler.matchonly('smallSecond'))
                        return `top bottom-=${0.71 * window.innerWidth - 16}`

                    return `top bottom-=200px`;
                },
                end: () => {
                    if (globalHandler.matchonly('smallSecond'))
                        return `bottom bottom-=${0.71 * window.innerWidth - 16}`

                    return `bottom bottom-=200px`;
                },
                scroller: `${(globalHandler.mainScrollbar) ? '.scroller' : ''}`,
                scrub: true,
                invalidateOnRefresh: true,
            }
        })
        .fromTo('section.benchmarking .section-in', {clipPath: () => {
            var sectionHeight = jQuery('section.benchmarking').height();
            return `inset(0px 0px ${sectionHeight}px 0px)`;	
        }},
        {clipPath: "inset(0px 0px 0px 0px)", ease: 'linear'}
        )
    }

    downMediumScreenClipping() {

    }
}