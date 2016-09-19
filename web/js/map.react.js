import { default as React, Component } from "react";
import $ from 'jquery';

import { default as canUseDOM } from "can-use-dom";
import { GoogleMapLoader, GoogleMap, Marker, SearchBox, InfoWindow } from "react-google-maps";

export default class GoogleMapBirds extends Component {

    state = {
        bounds: null,
        center: GoogleMapBirds.mapCenter,
        markers: [{
            nom: "",
            nomValide: "",
            showInfo: "",
            image: "",
            lat: "",
            lng: "",
        }]
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
            /** var position = [];
            var lat = [];
            var lng = [];
            var nom = [];
            var nomValide = [];
            var image = [];
            var showInfo = [];
            for (var i = 0; i < datas.length; i++) {
                position.push(new google.maps.LatLng(lat.push(datas[i].lat),lng.push(datas[i].lng)));
                nom.push(datas[i].nom);
                nomValide.push(datas[i].nomValide);
                image.push(datas[i].image);
                showInfo.push(datas[i].showInfo);
            }
            const markers = {...this.state.markers};
            markers.position = position;
            markers.nom = nom;
            markers.nomValide = nomValide;
            markers.image = image;
            markers.showInfo = showInfo;
            this.setState({markers: markers});
            **/
            datas.map = function(o, f) {
                var result = {};
                Object.keys(o).forEach(function(k) {
                    result[k] = f;
                });
                return result;
            };
            this.setState({markers: datas});
        });
        window.addEventListener(`resize`, this.handleWindowResize);
    };

    render() {
        var birds = this.state.markers;
        console.log(birds);
        return (
            <GoogleMapLoader
                containerElement={
                    <div
                        {...this.props}
                        style={{
                            height: '100%'
                        }} >
                    </div>
                }
                googleMapElement={
                    <GoogleMap
                        center={this.state.center}
                        defaultZoom={4}
                        ref='map'>
                        {birds.map((bird, i) => {
                            console.log(bird);
                            console.log(i);
                        })
                        }
                    </GoogleMap>
                }
            />

        );
    }
}