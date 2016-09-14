/**
 * Created by arthur on 9/7/16.
 */
import React from 'react';
import { Component } from "react";
import { default as canUseDOM } from "can-use-dom";
import $, { autocomplete } from 'jquery';
import { GoogleMap, Marker, SearchBox } from "react-google-maps";

export default class SearchBirds extends Component {

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

    static mapCenter = {
        lat: 46.867453,
        lng: 2.329102,
    };

    state = {
        bounds: null,
        center: SearchBirds.mapCenter,
        birds: {
            nom: '',
            nomValide: '',
            lat: 0,
            lng: 0
            }
    };

    componentDidMount() {
        if (!canUseDOM) {
            return;
        }
        $.getJSON("/index/json", (json) => {
            setTimeout(() => {
                let birds = JSON.parse(json);
                this.setState({birds: birds});
            }, 300);
        });
        window.addEventListener(`resize`, this.handleWindowResize);
    }

    handleBoundsChanged() {
        this.setState({
            bounds: this.refs.map.getBounds(),
            center: this.refs.map.getCenter(),
        });
    }

    handlePlacesChanged() {
        const places = this.refs.searchBox.getPlaces();
        const markers = [];

        // Add a marker for each place returned from search bar
        places.forEach(function (place) {
            markers.push({
                position: place.geometry.location,
            });
        });

        // Set markers; set map center to first search result
        const mapCenter = markers.length > 0 ? markers[0].position : this.state.center;

        this.setState({
            center: mapCenter,
            markers,
        });
    }



    search() {
        var hints = Array;
        let birds = this.state.birds;
        for (var datas = 0; datas<birds.length; datas++) {
            hints[datas] = birds[datas].nom;
        }
    }

    render() {
        let birds = this.state.birds;
        console.log(birds);
        return (
            <GoogleMap
                center={this.state.center}
                containerProps={{
                    ...this.props,
                    style: {
                        height: `100%`,
                    },
                }}
                defaultZoom={15}
                onBoundsChanged={::this.handleBoundsChanged}
                ref="map"
            >
                <SearchBox
                    id="search"
                    bounds={this.state.bounds}
                    controlPosition={google.maps.ControlPosition.TOP_LEFT}
                    onPlacesChanged={::this.handlePlacesChanged}
                    ref="searchBox"
                    placeholder="Recherhez un oiseau"
                    style={SearchBirds.inputStyle}
                />,
            </GoogleMap>
        );
    }
}