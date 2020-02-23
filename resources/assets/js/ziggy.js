const Ziggy = {
    namedRoutes: {
        "station.index": { "uri": "station", "methods": ["GET", "HEAD"], "domain": null },
        "station.create": { "uri": "station\/create", "methods": ["GET", "HEAD"], "domain": null },
        "station.store": { "uri": "station", "methods": ["POST"], "domain": null },
        "station.show": { "uri": "station\/{station}", "methods": ["GET", "HEAD"], "domain": null },
        "station.edit": { "uri": "station\/{station}\/edit", "methods": ["GET", "HEAD"], "domain": null },
        "station.update": { "uri": "station\/{station}", "methods": ["PUT", "PATCH"], "domain": null },
        "station.destroy": { "uri": "station\/{station}", "methods": ["DELETE"], "domain": null }
    },
    baseUrl: 'http://subway.scheme/',
    baseProtocol: 'http',
    baseDomain: 'subway.scheme',
    basePort: false,
    defaultParameters: []
};

if (typeof window.Ziggy !== 'undefined') {
    for (let name in window.Ziggy.namedRoutes) {
        Ziggy.namedRoutes[name] = window.Ziggy.namedRoutes[name];

    }
}

export {
    Ziggy
}
