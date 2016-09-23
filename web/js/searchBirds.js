import { default as React, Component } from "react";
import $ from 'jquery';

import { GoogleMapLoader, GoogleMap, InfoWindow, Marker, SearchBox } from "react-google-maps";

export default class GoogleMapBirds extends Component {

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

    state = {
        center: {
            lat: 46.867453,
            lng: 2.329102,
        },
        markers: [{
            nom: "",
            nomValide: "",
            showInfo: "",
            image: "",
            lat: "",
            lng: "",
        }],
        inputValue: "",
    };

    componentDidMount() {
        $.getJSON("/index/json", (json) => {
            let datas = JSON.parse(json);
            var markers = Object.keys(datas).map(function(k) { return datas[k] });
            this.setState({markers: markers});
        });
    }

    handleMarkerClick(marker) {
        marker.showInfo = true;
        this.setState(this.state);
    }
    handleMarkerClose(marker) {
        marker.showInfo = false;
        this.setState(this.state);
    }


    renderInfoWindow(ref, marker) {
        return (
            <InfoWindow
                key={`${ref}_info_window`}
                onCloseclick={this.handleMarkerClose.bind(this, marker)} >
                    <div>
                        <h2>{marker.nom}</h2>
                        <h2>{marker.nomValide}</h2>
                        <img src={marker.image}
                             width="160px" height="160px">
                        </img>
                    </div>
            </InfoWindow>
        );
    }

    render() {
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
                        <SearchBox />
                        {
                            this.state.markers.map((marker, index) => {
                                const ref = `marker_${index}`;
                                return ( <Marker
                                        key={index}
                                        ref={ref}
                                        position={new google.maps.LatLng(marker.lat, marker.lng)}
                                        image={marker.image}
                                        nom={marker.nom}
                                        nomValide={marker.nomValide}
                                        onClick={this.handleMarkerClick.bind(this, marker)}>

                                        {marker.showInfo ? this.renderInfoWindow(ref, marker) : null}
                                    </Marker>
                                );
                            })
                        }
                    </GoogleMap>
                }

            /> //end of GoogleMapLoader

        );
    }
}