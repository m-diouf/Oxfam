$(function() {

    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2010 Q1',
            publications: 2666,
            vues: null,
            inscriptions: 2647
        }, {
            period: '2010 Q2',
            publications: 2778,
            vues: 2294,
            inscriptions: 2441
        }, {
            period: '2010 Q3',
            publications: 4912,
            vues: 1969,
            inscriptions: 2501
        }, {
            period: '2010 Q4',
            publications: 3767,
            vues: 3597,
            inscriptions: 5689
        }, {
            period: '2011 Q1',
            publications: 6810,
            vues: 1914,
            inscriptions: 2293
        }, {
            period: '2011 Q2',
            publications: 5670,
            vues: 4293,
            inscriptions: 1881
        }, {
            period: '2011 Q3',
            publications: 4820,
            vues: 3795,
            inscriptions: 1588
        }, {
            period: '2011 Q4',
            publications: 15073,
            vues: 5967,
            inscriptions: 5175
        }, {
            period: '2012 Q1',
            publications: 10687,
            vues: 4460,
            inscriptions: 2028
        }, {
            period: '2012 Q2',
            publications: 8432,
            vues: 5713,
            inscriptions: 1791
        }],
        xkey: 'period',
        ykeys: ['publications', 'vues', 'inscriptions'],
        labels: ['publications', 'vues', 'inscriptions'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });

    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Download Sales",
            value: 12
        }, {
            label: "In-Store Sales",
            value: 30
        }, {
            label: "Mail-Order Sales",
            value: 20
        }],
        resize: true
    });

    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '2006',
            a: 100,
            b: 90
        }, {
            y: '2007',
            a: 75,
            b: 65
        }, {
            y: '2008',
            a: 50,
            b: 40
        }, {
            y: '2009',
            a: 75,
            b: 65
        }, {
            y: '2010',
            a: 50,
            b: 40
        }, {
            y: '2011',
            a: 75,
            b: 65
        }, {
            y: '2012',
            a: 100,
            b: 90
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B'],
        hideHover: 'auto',
        resize: true
    });

});
