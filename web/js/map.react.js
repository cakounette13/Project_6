import { default as React, Component } from "react";
import $ from 'jquery';

import { default as canUseDOM } from "can-use-dom";
import { GoogleMapLoader, GoogleMap, Marker, SearchBox } from "react-google-maps";

export default class GoogleMapBirds extends Component {

    state = {
        bounds: null,
        center: GoogleMapBirds.mapCenter,
        markers: {
            position: {
                lat: [],
                lng: [],
            },
            nom: [],
            nomValide: [],
        },
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
            const markers = {...this.state.markers};
            markers.position.lat = lat;
            markers.position.lng = lng;
            markers.nom = nom;
            markers.nomValide = nomValide;
            this.setState({markers: markers});
        });
        window.addEventListener(`resize`, this.handleWindowResize);
    };

    getLat(lat) {
        var lattitude;
        for (var i = 0; i<lat.length; i++)
        {
            lattitude = lat[i];
        }
    };
    getLng(lng) {
        var longitude;
        for (var i = 0; i<lng.length; i++)
        {
            longitude = lng[i];
        }
    }

    render() {
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
                        {this.state.markers.map(function(marker, i) {
                            return (
                                <Marker key={ref} ref={ref}
                                        position={marker.position}>
                                </Marker>
                            );
                        })}
                    </GoogleMap>
                }
            />
        );
    }
}