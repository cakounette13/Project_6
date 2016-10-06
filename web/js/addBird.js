import { default as React, Component } from 'react';
import { GoogleMapLoader, GoogleMap, InfoWindow, Marker } from "react-google-maps";
import canUseDOM from "can-use-dom";

const geolocation = (
    canUseDOM && navigator.geolocation ?
        navigator.geolocation :
        ({
            getCurrentPosition(success, failure) {
                failure(`Your browser doesn't support geolocation.`);
            },
        })
);

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

    state = {
        center: {
            lat: 46.867453,
            lng: 2.329102,
        },
    };

    componentDidMount() {
        geolocation.getCurrentPosition((position) => {
            if (this.isUnmounted) {
                return;
            }
            this.setState({
                center: {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                },
            });
        });
    }

    markerCoords(event){
        this.setState({
            center: {
                lat: event.latLng.lat(),
                lng: event.latLng.lng(),
            },
        });
    }

    render() {
        let position = this.state.center;
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
                        center={position}
                        defaultZoom={13}
                        ref='map'>
                        <Marker draggable
                                ref={`position`}
                                position={new google.maps.LatLng(position.lat, position.lng)}
                                onDragend={this.markerCoords.bind(this)}
                        />
                        <form name="form" method="post">
                            <div>
                                <label class="required" for="form_longitude">Longitude</label>
                                <input type="text" value={position.lat}/>
                            </div>
                            <div>
                                <label class="required" for="form_latitude">Latitude</label>
                                <input type="text" value={position.lng}/>
                            </div>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                    </GoogleMap>
                }
            />
        );
    }
}