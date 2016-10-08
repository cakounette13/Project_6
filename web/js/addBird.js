import { default as React, Component } from 'react';
import { GoogleMapLoader, GoogleMap, Marker } from "react-google-maps";
import canUseDOM from "can-use-dom";
import $ from 'jquery';


const geolocation = (
    canUseDOM && navigator.geolocation ?
        navigator.geolocation :
        ({
            getCurrentPosition(success, failure) {
                failure(`Your browser doesn't support geolocation.`);
            },
        })
);

export default class GoogleMapAddBird extends React.Component {

    state = {
        center: {
            lat: 46.867453,
            lng: 2.329102,
        },
    };

    componentDidMount() {
        $( "#add_bird_form" ).load( "form/ajax", function() {

            this.setState({form : form}) });
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
        let birdForm = this.state.form;
        console.log(birdForm);
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
                        <div>
                            <label htmlFor="form_longitude" className="required">Longitude</label>
                            <input id="form_longitude" name="form[longitude]" required="required" type="text" value={position.lng}></input>
                        </div>
                        <div>
                            <label htmlFor="form_latitude" className="required">Latitude</label>
                            <input id="form_longitude" name="form[longitude]" required="required" type="text" value={position.lat}></input>
                        </div>
                        <div>
                            <label htmlFor="nom" className="required">Nom</label>
                            <input id="nom" name="form[nom]" required="required" type="text"></input>
                        </div>
                        <div>
                            <label htmlFor="form_date" className="required">Date</label>
                            <input id="form_date" name="form[date]" required="required" type="date"></input>
                        </div>
                        <p>Placez le marker a l'endroit exact de l'observation :</p>
                        <input type="submit" value="Ajouter" className="btn btn-default pull-right" />
                    </GoogleMap>
                }
            />
        );
    }
}