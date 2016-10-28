import { default as React, Component } from 'react';
import $ from 'jquery';
import { GoogleMapLoader, GoogleMap, InfoWindow, Marker } from "react-google-maps";
export default class GoogleMapBirds extends React.Component {

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

    static infoboxStyle = {
        "font-family": 'Open Sans Condensed',
        "font-size": '22px',
        "font-weight": '400',
        "padding": '10px',
        "background-color": '#48b5e9',
        "color": 'red',
        "margin": '1px',
        "border-radius": '2px 2px 0 0',
    };

    static mapStyle = [{"elementType":"geometry","stylers":
        [{"hue":"#ff4400"},{"saturation":-68},{"lightness":-4}, {'gamma':0.72}]},
        {"featureType":"road","elementType":"labels.icon"},
        {"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"hue":"#0077ff"},
        {"gamma":3.1}]},{"featureType":"water","stylers":[{"hue":"#00ccff"},{"gamma":0.44},{"saturation":-33}]},
        {"featureType":"poi.park","stylers":[{"hue":"#44ff00"},{"saturation":-23}]},
        {"featureType":"water","elementType":"labels.text.fill","stylers":[{"hue":"#007fff"},{"gamma":0.77},
        {"saturation":65},{"lightness":99}]},{"featureType":"water","elementType":"labels.text.stroke",
        "stylers":[{"gamma":0.11},{"weight":5.6},{"saturation":99},{"hue":"#0091ff"},{"lightness":-86}]},
        {"featureType":"transit.line","elementType":"geometry","stylers":[{"lightness":-48},{"hue":"#ff5e00"},
        {"gamma":1.2},{"saturation":-23}]},{"featureType":"transit","elementType":"labels.text.stroke",
        "stylers":[{"saturation":-64},{"hue":"#ff9100"},{"lightness":16},{"gamma":0.47},{"weight":2.7}]}];

    state = {
        center: {
            lat: 46.867453,
            lng: 2.329102,
        },
        markers: [{
            nomValide: "",
            nomVern: "",
            showInfo: "",
            image: "",
            lat: "",
            lng: "",
        }],
        search: "",
        suggestions: []
    };

    componentDidMount() {
        $.getJSON("/json", (json) => {
            let datas = JSON.parse(json);
            var markers = Object.keys(datas).map(function(k) {return datas[k]});
            console.log(markers);
            this.setState({markers: markers});
        });
    }

    updateSearch(event){
        this.setState({search: event.target.value});
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
                onCloseclick={this.handleMarkerClose.bind(this, marker)}
                defaultOptions={{ styles: GoogleMapBirds.infoboxStyle}}>
                    <div id="infobox">
                        <h3 id="infoNom">{marker.nomVern}</h3>
                        <h3 id="infoNomValide">{marker.nomValide}</h3>
                        <img src={"http://localhost:3000/web/uploads/images/"+marker.image}
                             width="160px" height="160px">
                        </img>
                    </div>
            </InfoWindow>
        );
    }

    render() {
        console.log(this.state.markers);
        let birds = this.state.markers.filter(
            (marker) => {
                if (marker.nomVern === null) marker.nomVern = marker.nomValide;
                return marker.nomVern.toLowerCase().indexOf(this.state.search.toLowerCase()) !== -1;
            }
        );
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
                        ref='map'
                        defaultOptions={{ styles: GoogleMapBirds.mapStyle}}
                        >

                    <input list="hints"
                               placeholder="Rechercher un oiseau"
                               style={GoogleMapBirds.inputStyle}
                               id="input-search"
                               onChange={this.updateSearch.bind(this)} />
                        <datalist id="hints">
                            {birds.map((marker, index) => {
                                const ref = `marker_${index}`;
                                return ( <option key={index}
                                                 ref={ref}
                                                 value={marker.Vern}
                                    >
                                        {marker.nomVern}
                                    </option>
                                )
                            })}
                        </datalist>
                        {
                            birds.map((marker, index) => {
                                const ref = `marker_${index}`;
                                return ( <Marker
                                        key={index}
                                        ref={ref}
                                        position={new google.maps.LatLng(marker.lat, marker.lng)}
                                        image={marker.image}
                                        nomVern={marker.nomVern}
                                        nomValide={marker.nomValide}
                                        onClick={this.handleMarkerClick.bind(this, marker)}>
                                        {marker.showInfo ? this.renderInfoWindow(ref, marker) : null}
                                    </Marker>
                                );
                            })
                        }
                    </GoogleMap>
                }
            />
        );
    }
}