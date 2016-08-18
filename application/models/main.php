<?php

class Main extends CI_Model
{
    public function new_trip($trip, $user)
    {
        $query = "INSERT INTO trips (destination, description, start, end, planned_by, created_at) VALUES(?,?,?,?,?,?)";
        $values = array($trip['destination'], $trip['description'], $trip['start'], $trip['end'], $user, date('Y-m-d, H:i:s'),
            date('Y-m-d, H:i:s'));
        return $this->db->query($query, $values);
    }

    public function trip_id($destination)
    {
        $query = "SELECT trips.id FROM trips WHERE destination = ?";
        $values = array($destination);
        return $this->db->query($query, $values)->row_array();
    }

    public function add_userinfo($user, $trip)
    {
        $query = "INSERT INTO user_trips (user_id, trip_id) VALUES (?,?)";
        $values = array($user, $trip['id']);
        return $this->db->query($query, $values);
    }

    public function my_trips($user)
    {
        $query = "SELECT trips.destination, trips.start, trips.end, trips.description, trips.id AS trip_id
            FROM trips JOIN user_trips ON trips.id = user_trips.trip_id
            WHERE user_trips.user_id = ?";
        $values = array($user);
        return $this->db->query($query, $values)->result_array();
    }

    public function user_trips($user)
    {
        $query = "SELECT users.name, trips.destination, trips.start, trips.end, trips.description, trips.id
                    AS trip_id
                    FROM trips JOIN user_trips ON trips.id = user_trips.trip_id
                    JOIN users ON user_trips.user_id = users.id
                    WHERE user_trips.user_id != ?";
        $values = array($user);
        return $this->db->query($query, $values)->result_array();
    }

    public function trip_detail($trip)
    {
        $query = "SELECT users.name, trips.destination, trips.start, trips.end, trips.description
                    FROM users JOIN user_trips ON users.id = user_trips.user_id
                    JOIN trips ON user_trips.trip_id = trips.id
                    WHERE trips.id = ?";
        $values = array($trip);
        return $this->db->query($query, $values)->row_array();
    }

    public function planner($trip)
    {
        $query = "SELECT users.name FROM users JOIN user_trips ON users.id = user_trips.user_id
                  JOIN trips ON user_trips.trip_id = trips.id
                  WHERE trips.planned_by = users.id AND trips.id = ?
                  GROUP BY user_id";
        $values = array($trip);
        return $this->db->query($query, $values)->row_array();
    }

    public function others($trip, $users)
    {
        $query = "SELECT users.name FROM users JOIN user_trips ON users.id = user_trips.user_id
                  JOIN trips ON user_trips.trip_id = trips.id WHERE trips.id = ? AND user_id != ?
                  GROUP BY user_id";
        $values = array($trip, $users);
        return $this->db->query($query, $values)->result_array();
    }

    public function join_trip($user, $trip)
    {
        $query = "INSERT INTO user_trips (user_id, trip_id) VALUES(?,?)";
        $values = array($user, $trip);
        return $this->db->query($query, $values);
    }
}