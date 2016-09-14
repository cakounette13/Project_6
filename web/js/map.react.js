import { default as React, Component } from "react";
import { default as update } from "react-addons-update";
import $ from 'jquery';

import { default as canUseDOM } from "can-use-dom";
import { GoogleMapLoader, GoogleMap, Marker, SearchBox } from "react-google-maps";

export default class GoogleMapBirds extends Component {

    state = {
        bounds: null,
        center: GoogleMapBirds.mapCenter,
        birds: {
            nom: [],
            nomValide: [],
            lat: [],
            lng: []
        },
        markers : []
    };
    static mapCenter = {
        lat: 46.867453,
        lng: 2.329102,
    };

    static inputStyle = {
        "border": `1px solid transparent`,
        "borderRadius": `1px`,
        "boxShadow": `0 2px 6px rgba(0, 0, 0, 0.3)`,
        "boxSizing": `border-box`,
        "MozBoxSizing": `border-box`,
        "fontSize": `14px`,
        "height": `32px`,
        "marginTop": `27px`,
        "outline": `none`,
        "padding": `0 12px`,
        "textOverflow": `ellipses`,
        "width": `400px`,
    };


    componentDidMount() {
        if (!canUseDOM) {
            return;
        }
        $.getJSON("/index/json", (json) => {
            let datas = JSON.parse(json);
            var lat = [];
            var lng = [];
            var nom = [];
            var nomValide = [];
            for (var i = 0; i < datas.length; i++) {
                lat.push(datas[i].lat);
                lng.push(datas[i].lng);
                nom.push(datas[i].nom);
                nomValide.push(datas[i].nomValide);
            }
            const birds = {...this.state.birds};
            birds.lat = lat;
            birds.lng = lng;
            birds.nom = nom;
            birds.nomValide = nomValide;
            this.setState({birds: birds});
        });
        window.addEventListener(`resize`, this.handleWindowResize);
    };

    componentWillUnmount() {
        this.serverRequest.abort();
    };

    render() {
        console.log(this.state.birds.nom[0]);
        console.log(this.state.birds.nomValide[0]);
        console.log(this.state.birds.lat[0]);
        console.log(this.state.birds.lng[0]);
        console.log(this.state.birds);
        return (
            <GoogleMapLoader
                containerElement={
                    <div
                        {...this.props}
                        style={{
                            height: `100%`,
                        }}
                    />
                }
                googleMapElement={
                    <GoogleMap
                        ref={(map) => (this._googleMapComponent = map) && console.log(map.getZoom())}
                        defaultZoom={3}
                        defaultCenter={{ lat: -25.363882, lng: 131.044922 }}
                    >
                        <SearchBox
                            id="search"
                            controlPosition={google.maps.ControlPosition.TOP_LEFT}
                            ref="searchBox"
                            placeholder="Recherhez un oiseau"
                            style={GoogleMapBirds.inputStyle}
                        />,
                        <Marker
                        />
                    </GoogleMap>
                }
            />
        );
    }
}